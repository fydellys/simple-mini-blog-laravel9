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
                                        <h5>Configurações</h5>
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
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Site</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">E-mail SMTP</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <p class="mb-0">

                                                    <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                        <div class="form-group">
                                                            <label>Nome da empresa</label>
                                                            <input type="text" class="form-control" id="company_name" name="company_name" aria-describedby="" value="{{ old('company_name', Settings('company_name')) }}" placeholder="Nome" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Descrição da empresa</label>
                                                            <input type="text" class="form-control" id="company_description" name="company_description" aria-describedby="" value="{{ old('company_description', Settings('company_description')) }}" placeholder="Descrição da empresa" required>
                                                        </div>
                                                        <div class="form-group thumb">
                                                            <label>Logo atual</label><br />
                                                            @if (!Settings('company_logo') == '')
                                                            <img src="{{ url("storage/".Settings('company_logo')) }}" width="200em" height="100em">
                                                            @else
                                                            <img src="{{ url("storage/uploads/default-logo.png") }}" width="200em" height="100em">
                                                            @endif
                                                        </div>
                                                        <div class="custom-file">
                                                            <label>Imagem</label>
                                                            <input type="file" class="custom-file-input" id="company_logo" name="company_logo">
                                                            <label class="custom-file-label">Escolha um arquivo</label>
                                                        </div>

                                                        <input type="hidden" id="postType" name="postType" value="company">

                                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                                    </form>

                                                </p>
                                            </div>

                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <p class="mb-0">

                                                    <form action="{{ route('admin.settings.update') }}" method="post">
                                                    @csrf
                                                        <input type="hidden" id="smtp_mail_mailer" name="smtp_mail_mailer" value="smtp" required>

                                                        <div class="form-group">
                                                            <label>SMTP Host</label>
                                                            <input type="text" class="form-control" id="smtp_mail_host" name="smtp_mail_host" value="{{ old('smtp_mail_host', Settings('smtp_mail_host')) }}" placeholder="SMTP Host">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>SMTP Port</label>
                                                            <input type="text" class="form-control" id="smtp_mail_port" name="smtp_mail_port" value="{{ old('smtp_mail_host', Settings('smtp_mail_port')) }}" placeholder="SMTP Port">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>SMTP Usuário (E-mail)</label>
                                                            <input type="text" class="form-control" id="smtp_mail_username" name="smtp_mail_username" value="{{ old('smtp_mail_username', Settings('smtp_mail_username')) }}"  placeholder="SMTP Usuário (E-mail)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>SMTP Senha (Senha do e-mail)</label>
                                                            <input type="text" class="form-control" id="smtp_mail_password" name="smtp_mail_password" value="{{ old('smtp_mail_password', Settings('smtp_mail_password')) }}"   placeholder="SMTP Senha (Senha do e-mail)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>SMTP Segurança (SSL / TLS)</label>
                                                            <input type="text" class="form-control" id="smtp_mail_encryption" name="smtp_mail_encryption" value="{{ old('smtp_mail_encryption', Settings('smtp_mail_encryption')) }}" placeholder="SMTP Segurança (SSL / TLS)">
                                                        </div>

                                                        <input type="hidden" id="postType" name="postType" value="smtp" required>

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

