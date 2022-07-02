@extends('layouts.admin.app')
@section('title', 'Dashboard')
@section('scripts-header')
<link rel="stylesheet" href="{{url('assets/assets/plugins/data-tables/css/datatables.min.css')}}">
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
                                        <h5>Gerenciar posts</h5>
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

                                            <div class="card-body" style="padding-top: 10px">

                                                <div class="table-responsive">
                                                    <table id="responsive-table" class="display table dt-responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Imagem</th>
                                                                <th>Título</th>
                                                                <th>Categoria</th>
                                                                <th>Autor</th>
                                                                <th>Data de criação</th>
                                                                <th>Status</th>
                                                                <th>Ações</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i=0; ?>
                                                            @foreach($data as $post)
                                                            <?php $i++ ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td><img src="{{ url("storage/".$post->image) }}" class="rounded float-start" width="70em" height="40em"></td>
                                                                <td>{{ $post->title }}</td>
                                                                <td>{{ $post->category->name }}</td>
                                                                <td>{{ $post->user->name }}</td>
                                                                <td>{{ date('d/m/Y', strtotime($post->created_at)) }}</td>
                                                                <td>@if ($post->status== 1) Pública @else Invisível @endif</td>
                                                                <td>
                                                                    <form method="post" action="{{ route('admin.post.destroy', $post->id) }}">
                                                                    <a href="{{ route('admin.post.edit', $post->id) }}" type="button" class="btn btn-primary btn-sm">Editar</a>
                                                                    @csrf
                                                                    <button type="button" class="btn btn-danger btn-sm show_confirm">Excluir</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
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

@section('scripts-footer')
<script src="{{url('assets/assets/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="{{url('assets/assets/js/pages/ac-alert.js')}}"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal({
             title: `Tem certeza de que deseja excluir este registro?`,
             text: "Se você excluir isso, ele desaparecerá para sempre.",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         })
         .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                    swal("O registro foi excluído com sucesso!", {
                        icon: "success",
                    });
                } else {
                    swal("O seu registro não foi excluído!", {
                        icon: "error",
                    });
                }
         });
     });
</script>
<script src="{{url('assets/assets/plugins/data-tables/js/datatables.min.js')}}"></script>
<script src="{{url('assets/assets/js/pages/tbl-datatable-custom.js')}}"></script>
@endsection
