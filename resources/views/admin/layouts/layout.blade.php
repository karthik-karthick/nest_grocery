<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--favicon-->
	<link rel="icon" href="{{ asset('admin/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">

	<link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/highcharts/css/highcharts.css')}}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('admin/assets/plugins/notifications/css/lobibox.min.css')}}" />

	<!-- loader-->
	<link href="{{ asset('admin/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{ asset('admin/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="{{ asset('admin/assets/css276c7.css')}}?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{ asset('admin/assets/css/header-colors.css')}}" />
	<title>Synadmin – Bootstrap5 Admin Template</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="{{ asset('admin/assets/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
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
                icon: 'bx bx-check-circle',
                msg: '{{ session('success') }}'
            });
        });
    </script>
@endif
    
@include('admin.contents.header')
@include('admin.contents.sidebar')

@yield('admin_layout')

@include('admin.contents.theme_customizer')
@include('admin.contents.footer')
    	<!-- Bootstrap JS -->
	<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/highcharts/js/highcharts.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/highcharts/js/exporting.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/highcharts/js/variable-pie.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/highcharts/js/export-data.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/highcharts/js/accessibility.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{ asset('admin/assets/js/index2.js')}}"></script>
	<!--Data table-->
	<script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<!-- App JS -->
	<script src="{{ asset('admin/assets/js/app.js')}}"></script>
	<script>
		// new PerfectScrollbar('.customers-list');
		// new PerfectScrollbar('.store-metrics');
		// new PerfectScrollbar('.product-list');
	</script>
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
			  'use strict'
	
			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')
	
			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
				.forEach(function (form) {
				  form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					  event.preventDefault()
					  event.stopPropagation()
					}
	
					form.classList.add('was-validated')
				  }, false)
				})
			})()
	</script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<!-- ckeditor -->
    <script src="{{ asset('admin/assets/js/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/assets/js/table-responsive.init.js') }}"></script>
    <script src="{{ asset('admin/assets/js/form-editor.init.js') }}"></script>
	<!--notification js -->
	<script src="{{ asset('admin/assets/plugins/notifications/js/lobibox.min.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/notifications/js/notifications.min.js')}}"></script>
	<script src="{{ asset('admin/assets/plugins/notifications/js/notification-custom-script.js')}}"></script>
	<script src="{{ asset('admin/assets/js/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/input-tags/js/tagsinput.js')}}"></script>


</body>

</html>