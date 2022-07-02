@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Configurações do usuário</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> Maximizar</span><span style="display:none"><i class="feather icon-minimize"></i> Minimizar</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> Colpaso</span><span style="display:none"><i class="feather icon-plus"></i> Expandir</span></a></li>
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> Remover</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                    @endif

                                    <div class="col-sm-12">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Alterar dados pessoais</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Alterar senha</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Alterar foto</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <p class="mb-0">

                                                    <form action="{{ route('admin.user.update') }}" method="post">
                                                    @csrf

                                                        <div class="form-group">
                                                            <label>Nome</label>
                                                            <input type="name" class="form-control" id="name" name="name" aria-describedby="" value="{{ old('name', Auth::user()->name) }}" placeholder="Nome" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>E-mail</label>
                                                            <input type="email" class="form-control" id="email" name="email" aria-describedby="" value="{{ old('email', Auth::user()->email) }}" placeholder="E-mail" required>
                                                        </div>
                                                            <input type="hidden" id="postType" name="postType" value="change-data" required>

                                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                                    </form>

                                                </p>
                                            </div>

                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <p class="mb-0">

                                                    <form action="{{ route('admin.user.update') }}" method="post">
                                                    @csrf
                                                        <div class="form-group">
                                                            <label>Nova senha</label>
                                                            <input type="password" class="form-control" id="password" name="password" aria-describedby="" placeholder="Nova senha">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Confirme a nova senha</label>
                                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="" placeholder="Conforme a nova senha">
                                                        </div>
                                                            <input type="hidden" id="postType" name="postType" value="change-password">
                                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                                    </form>

                                                </p>
                                            </div>



                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                <p class="mb-0">

                                                    <div class="form-group">
                                                    @if (Auth::user()->photo)
                                                        <img src="{{ url("storage/".Auth::user()->photo) }}" class="img-radius" alt="{{Auth::user()->name}}" width="150" height="150">
                                                    @else
                                                        <img src="{{ url("storage/users/default.jpg") }}" class="img-radius" alt="{{Auth::user()->name}}" width="150" height="150">
                                                    @endif
                                                    </div>

                                                    <form action="{{ route('admin.user.update') }}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="photo" name="photo">
                                                            <label class="custom-file-label">Escolha um arquivo</label>
                                                        </div>
                                                            <input type="hidden" id="postType" name="postType" value="change-photo">
                                                            <br /><br />
                                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                                    </form>

                                                </p>
                                            </div>
                                        </div>
                                    </div>



                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

