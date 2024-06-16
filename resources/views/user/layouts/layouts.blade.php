<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nest - Multipurpose eCommerce HTML Template</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/assets/imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/main5103.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/notifications/css/lobibox.min.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ asset('admin/assets/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('user/assets/css/plugins/slider-range.css') }}" />

</head>

<body>
     <!-- Preloader Start -->
     <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('user/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Lobibox.notify('success', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bx bx-check-circle',
                    msg: '{{ session('success') }}'
                });
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Lobibox.notify('error', {
                    pauseDelayOnHover: true,
                    continueDelayOnInactiveTab: false,
                    position: 'top right',
                    icon: 'bx bx-x-circle',
                    msg: '{{ session('error') }}'
                });
            });
        </script>
    @endif
    <!-- header-->
    @include('user.contents.header')

    @yield('user_layout')

    <!-- Footer  -->
    @include('user.contents.footer')


   
    <!-- Vendor JS-->
    <script src="{{ asset('user/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('user/assets/js/main5103.js?v=6.0')}}"></script>
    <script src="{{ asset('user/assets/js/shop5103.js?v=6.0')}}"></script>

    <script src="{{ asset('user/assets/js/user/common.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/notifications/js/notifications.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('user/assets/js/plugins/slider-range.js') }}"></script>
</body>

</html>
