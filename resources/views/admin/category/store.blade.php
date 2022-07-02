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
                                        <h5>Criar nova categoria</h5>
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
                                    <div class="card-block">

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

                                            <div class="card-body" style="padding-top: 10px">

                                                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                            <div class="form-group">
                                                                <label>Nome da categoria</label>
                                                                <input type="text" class="form-control" id="name" name="name" maxlength="255" oninput="TitleToSlug()" value="{{ old('name') }}" placeholder="Nome da categoria" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Descrição da da categoria (máximo: 150 caracteres)</label>
                                                                <input type="text" class="form-control" id="description" name="description" maxlength="150" value="{{ old('description') }}" placeholder="Descrição da categoria">
                                                            </div>
                                                            <label>Imagem</label>
                                                            <div class="custom-file">
                                                                <label>Imagem</label>
                                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                                <label class="custom-file-label">Escolha um arquivo</label>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                                </form>

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

@section('scripts-footer')
    <!-- tinymce editor -->
    <script src="{{url('assets/assets/plugins/tinymce/tinymce.min.js')}}"></script>

    <script type="text/javascript">
        // tinymce editor
        $(window).on('load', function() {
            tinymce.init({
                selector: '#content',
                height: 200,
                theme: 'modern',
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
                image_advtab: true
            });
        });
</script>
<script>
    function TitleToSlug(){
      var Title = document.getElementById("title").value;
      var output =  Title.toLowerCase();
      output = output.replace(/[^\w ]+/g, '');
      output = output.replace(/ +/g, '-');
      document.getElementById("slug").value = output;

  }
</script>
@endsection
