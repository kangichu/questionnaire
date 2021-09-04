<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Canon') }}</title>

		<!-- Font Awesome Icons -->
		<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

	 	<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
		
		
	</head>
	<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
		<div class="wrapper">
			@yield('content')
		</div>
		<!-- ./wrapper -->
		<!-- REQUIRED SCRIPTS -->

		<!-- jQuery -->
		<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

		<!-- Bootstrap 4 -->
		<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		
		<!-- AdminLTE App -->
		<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>


		<!-- DataTables -->
		<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
		<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('dist/js/demo.js') }}"></script>
		<!-- page script -->
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
		<script>
		  $(function () {
		    $("#table1").DataTable({
		      "responsive": true,
		      "autoWidth": false,
		    });
		    $("#table2").DataTable({
		      "responsive": true,
		      "autoWidth": false,
		    });
		    $("#table3").DataTable({
		      "responsive": true,
		      "autoWidth": false,
		      'iDisplayLength': 10,
		    });
		    $("#table4").DataTable({
		      "responsive": true,
		      "autoWidth": false,
		    });
		  });
		</script>
		<script type="text/javascript">
			// In your Javascript (external .js resource or <script> tag)
			$(function() {
			    $('.js-example-basic-single').select2();
			});
		</script>
		<script type="text/javascript">
			$(function () {
				$('#reservationdate1').datetimepicker({
				    format: 'YYYY-MM-DD',
				});
				$('#reservationdate2').datetimepicker({
				    format: 'YYYY-MM-DD',
				});
				
			})
		</script>
		<script type="text/javascript">
			$('.entryForm').submit(function (event) {
		        if ($(this).hasClass('submitted')) {
		            event.preventDefault();
		        }
		        else {
		            $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
		            $(this).addClass('submitted');
		        }
		    });
		</script>
		<script type="text/javascript">
			$('.submit').submit(function (event) {
		        if ($(this).hasClass('submitted')) {
		            event.preventDefault();
		        }
		        else {
		            $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
		            $(this).addClass('submitted');
		        }
		    });
		</script>
	</body>
</html>