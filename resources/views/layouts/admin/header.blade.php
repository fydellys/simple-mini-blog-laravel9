<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
        <a href="index.html" class="b-brand">
            <a href="{{ Route('admin.dashboard')}}" class="b-brand">
                @if (!Settings('company_logo') == '')
                <img src="{{ url("storage/".Settings('company_logo')) }}" width="80em" height="40em">
                @else
                <img src="{{ url("storage/uploads/default-logo.png") }}" width="80em" height="40em">
                @endif
                <span class="b-title">{{Settings('company_name')}}</span>
            </a>
       </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="#!">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            <li class="nav-item">

            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">

                            @if (Auth::user()->photo)
                            <img src="{{ url("storage/".Auth::user()->photo) }}" class="img-radius" alt="{{Auth::user()->name}}">
                            @else
                            <img src="{{ url("storage/users/default.jpg") }}" class="img-radius" alt="{{Auth::user()->name}}">
                            @endif

                            <span>{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" id="logout_form">
                            @csrf
                            <a href="#" onClick="document.getElementById('logout_form').submit();" class="dud-logout" title="Sair">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="{{Route('admin.user.index')}}" class="dropdown-item"><i class="feather icon-settings"></i> Configurações do usuário</a></li>
                            @csrf
                            <li><a href="#" onClick="document.getElementById('logout_form').submit();" class="dropdown-item"><i class="feather icon-lock"></i> Sair</a></li>
                            </form>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>


