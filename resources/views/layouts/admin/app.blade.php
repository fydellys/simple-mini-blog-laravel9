<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>@yield('title') - {{Settings('company_name')}}</title>
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content=""/>
    <meta name="keywords" content="">
    <link rel="icon" href="{{ url('assets/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('assets/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/assets/plugins/animation/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/assets/plugins/notification/css/notification.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/assets/css/style.css') }}">
    @yield('scripts-header')
</head>
<body>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    @include('layouts.admin.sidebar')
    @include('layouts.admin.header')
    @yield('content')


<!-- Required Js -->
<script src="{{url('assets/assets/js/vendor-all.min.js')}}"></script>
<script src="{{url('assets/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/assets/js/pcoded.min.js')}}"></script>
<!-- amchart js -->
<script src="{{url('assets/assets/plugins/amchart/js/amcharts.js')}}"></script>
<script src="{{url('assets/assets/plugins/amchart/js/gauge.js')}}"></script>
<script src="{{url('assets/assets/plugins/amchart/js/serial.js')}}"></script>
<script src="{{url('assets/assets/plugins/amchart/js/light.js')}}"></script>
<script src="{{url('assets/assets/plugins/amchart/js/pie.min.js')}}"></script>
<script src="{{url('assets/assets/plugins/amchart/js/ammap.min.js')}}"></script>
<script src="{{url('assets/assets/plugins/amchart/js/usaLow.js')}}"></script>
<script src="{{url('assets/assets/plugins/amchart/js/radar.js')}}"></script>
<script src="{{url('assets/assets/plugins/amchart/js/worldLow.js')}}"></script>

<!-- notification Js -->
<script src="{{url('assets/assets/plugins/notification/js/bootstrap-growl.min.js')}}"></script>
<!-- dashboard-custom js -->

<script src="{{url('assets/assets/js/pages/dashboard-custom.js')}}"></script>

@yield('scripts-footer')

</body>

</html>
