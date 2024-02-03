
@php
    $currentPage = 'usermanagement'; 
@endphp
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="{{asset('front/assets')}}" data-template="vertical-menu-template-free">

<head>
    @include('admin.include.head')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('admin.include.sidebar')

            <div class="layout-page">

                @include('admin.include.nav')

                            <div class="content-wrapper">

                                <!-- Content -->

                                <div class="container-xxl flex-grow-1 container-p-y">
                                    <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> Add User</h4>

                                    <div class="row">
                                        <div class="col-xl">
                                            <div class="card mb-4">
                                                <div
                                                    class="card-header d-flex justify-content-between align-items-center">
                                                    <h5 class="mb-0">Add User</h5>
                                                </div>
                                                <div class="card-body">
                                                    <form method="post"  action="{{ route('adduserpost')}}">
                                                    @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 col-xl-6">

                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-Full Name">Full Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-Full Name"
                                                                        placeholder="Full Name" required
                                                                        name="name" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-Email.">Email</label>
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-Email." placeholder="Email."
                                                                        required name="email" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="basic-default-Email.">Password</label>
                                                                    <input type="password" class="form-control"
                                                                        id="basic-default-Password."
                                                                        placeholder="Password." required
                                                                        name="password" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="user-type">User
                                                                        Type</label>
                                                                    <select class="form-select" id="user-type"
                                                                        name="user_type" required>
                                                                        <option value="">Select User Type</option>
                                                                        <option value="2">User</option>
                                                                        <option value="1">Admin</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div> 
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <!-- footer Start -->
                                @include('admin.include.footer')

                                <div class="content-backdrop fade"></div>
                            </div>
                            <!-- Content wrapper -->
                        </div>
                        <!-- / Layout page -->
                    </div>

                    <div class="layout-overlay layout-menu-toggle"></div>
                </div>


                <!-- Main jQuery -->
                @include('admin.include.script')

</body>

</html>