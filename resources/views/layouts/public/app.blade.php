<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{Settings('company_name')}}</title>
    <link href="{{url('public/css/style.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


    <header class="main_header_area" id="header">
       <div class="container">
            <div class="header_menu">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{Route('public.index')}}">

                        @if (!Settings('company_logo') == '')
                        <img src="{{ url("storage/".Settings('company_logo')) }}" width="130" height="65">
                        @else
                        <img src="{{ url("storage/uploads/default-logo.png") }}" width="130" height="65">
                        @endif

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar_supported" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    @php
                    $categories = App\Models\Admin\Category::orderBy('id', 'DESC')->get();
                    @endphp


                    <div class="collapse navbar-collapse navbar_supported">
                        <ul class="navbar-nav">
                            <li><a class="nav-link" href="{{Route('public.index')}}" role="button">Home</a></li>
                            <li><a class="nav-link" href="{{Route('public.blog')}}">Blog</a></li>
                            @foreach ($categories as $category)
                            <li><a href="{{Route('public.category',$category->name)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
           </div>
        </div>
    </header>

    @yield('content')


    <footer class="footer_area text-center">
        <div class="container">
            <div class="footer_inner row">
                <div class="col-lg-12 footer_logo">
                    <a href="{{Route('public.index')}}">
                        @if (!Settings('company_logo') == '')
                        <img src="{{ url("storage/".Settings('company_logo')) }}" width="130" height="65">
                        @else
                        <img src="{{ url("storage/uploads/default-logo.png") }}" width="130" height="65">
                        @endif
                    </a>
                    <p class="text-center" style="padding-top:10px; text-align: center;margin-left: auto;margin-right: auto;">{{Settings('company_description')}}</p>
                </div>

            </div>
        </div>

    </footer>

    <button class="scroll-top">
        <i class="fa fa-angle-double-up"></i>
    </button>
    <div class="preloader"></div>
    <script src="{{url('public/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('public/js/popper.min.js')}}"></script>
    <script src="{{url('public/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/vendors/animate-css/wow.min.js')}}"></script>
    <script src="{{url('public/js/theme.js')}}"></script>
</body>


</html>
