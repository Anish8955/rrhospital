@php
$currentPage = 'appointments';
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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light"></span> All Appointment</h4>
                        <!-- Hoverable Table rows -->
                        <div class="card">

                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Full Name</th>
                                            <th>Phone Number</th>
                                            <th>Email Address</th>
                                            <th>Date</th>
                                            <th>Area</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Post Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($appointment as $appointment)
                                        <tr>
                                            <td>{{ $appointment->id }}</td>
                                            <td>{{ $appointment->name }}</td>
                                            <td>{{ $appointment->phone }}</td>
                                            <td>{{ $appointment->email }}</td>
                                            <td>{{ $appointment->date }}</td>
                                            <td>{{ $appointment->area }}</td>
                                            <td>{{ $appointment->city }}</td>
                                            <td>{{ $appointment->state }}</td>
                                            <td>{{ $appointment->code }}</td>
                                            <!-- Assuming 'user_type' is a field in your 'users' table -->
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <form action="{{ route('deleteappointment', ['id' => $appointment->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"
                                                                onclick="return confirm('Are you sure you want to delete this user?')">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Hoverable Table rows -->

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