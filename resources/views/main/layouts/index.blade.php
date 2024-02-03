<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('main.includes.head')
</head>

<body id="top">

   @include('main.includes.header')

   @yield('content')
 
    <!-- footer Start -->
   @include('main.includes.footer')


    <!-- Main jQuery -->
   @include('main.includes.Scripts')

</body>

</html>