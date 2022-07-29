<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/apple-touch-icon.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon-16x16.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{asset('assets/images/deskapp-logo.svg')}}" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>
    <!--Start Header-->
	@include('layout.header')
    <!--End Header-->

    <!--Start Sidebar-->
    @include('layout.sidebar')
    <!--End Sidebar-->

    <!--Start Content-->
    @yield('content')
            <!--End Content-->

            <!--Start Footer-->
            @include('layout.footer')
            <!--End Footer-->
		</div>
	</div>
	<!-- js -->
	<script src="{{asset('assets/js/core.js')}}"></script>
	<script src="{{asset('assets/js/script.min.js')}}"></script>
	<script src="{{asset('assets/js/process.js')}}"></script>
	<script src="{{asset('assets/js/layout-settings.js')}}"></script>
	<script src="{{asset('assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/js/dashboard.js')}}"></script>
</body>
</html>
