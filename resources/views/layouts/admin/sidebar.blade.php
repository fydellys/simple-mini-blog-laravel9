<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ Route('admin.dashboard')}}" class="b-brand">
                @if (!Settings('company_logo') == '')
                <img src="{{ url("storage/".Settings('company_logo')) }}" width="80em" height="40em">
                @else
                <img src="{{ url("storage/uploads/default-logo.png") }}" width="80em" height="40em">
                @endif
                <span class="b-title">{{Settings('company_name')}}</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Menu</label>
                </li>
                <li class="nav-item pcoded-hasmenu
                @if (request()->routeIs('admin.dashboard')== 1) active pcoded-trigger @endif
                @if (request()->routeIs('admin.post.index')== 1) active pcoded-trigger @endif
                @if (request()->routeIs('admin.post.store')== 1) active pcoded-trigger @endif
                @if (request()->routeIs('admin.post.edit')== 1) active pcoded-trigger @endif
                @if (request()->routeIs('admin.category.index')== 1) active pcoded-trigger @endif
                @if (request()->routeIs('admin.category.store')== 1) active pcoded-trigger @endif
                @if (request()->routeIs('admin.category.edit')== 1) active pcoded-trigger @endif
                ">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    <ul class="pcoded-submenu">
                        <li class="@if (request()->routeIs('admin.dashboard')== 1) active @endif"><a href="{{ Route('admin.dashboard')}}" class="">Início</a></li>
                        <li class="@if (request()->routeIs('admin.post.store')== 1) active @endif"><a href="{{ Route('admin.post.store')}}" class="">Criar novo post</a></li>
                        <li class="@if (request()->routeIs('admin.post.index')== 1) active @endif"><a href="{{ Route('admin.post.index')}}" class="">Gerenciar posts</a></li>
                        <li class="@if (request()->routeIs('admin.category.index')== 1) active @endif"><a href="{{ Route('admin.category.index')}}" class="">Gerenciar categorias</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu
                @if (request()->routeIs('admin.settings.index')== 1) active pcoded-trigger @endif
                ">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Configurações</span></a>
                    <ul class="pcoded-submenu">
                        <li class="@if (request()->routeIs('admin.settings.index')== 1) active @endif"><a href="{{ Route('admin.settings.index')}}" class="">Configurações</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

  <section class="header-user-list">
    <div class="h-list-header">
        <div class="input-group">
            <input type="text" id="search-friends" class="form-control" placeholder="">
        </div>
    </div>
    <div class="h-list-body">
        <a href="#!" class="h-close-text"><i class="feather icon-chevrons-right"></i></a>
        <div class="main-friend-cont scroll-div">
        </div>
    </div>
</section>

<section class="header-chat">
    <div class="h-list-header">
        <h6></h6>
        <a href="#!" class="h-back-user-list"><i class="feather icon-chevron-left"></i></a>
    </div>
    <div class="h-list-body">
        <div class="main-chat-cont scroll-div">
        </div>
    </div>

</section>


