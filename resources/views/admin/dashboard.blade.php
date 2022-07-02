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

                            <div class="col-md-6 col-xl-4">
                                <div class="card theme-bg bitcoin-wallet">
                                    <div class="card-block">
                                        <h5 class="text-white mb-2">Total de posts</h5>
                                        <h2 class="text-white mb-2 f-w-300">{{ $data->count() }}</h2>
                                        <span class="text-white d-block"></span>
                                        <i class="fas fa-newspaper f-70 text-white"></i>
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

