@extends('layouts.public.app')
@section('content')

<div class="container">
    <div class="pages_heder">
        <h2>Blog</h2>
        <ol class="breadcrumb">
            <li><a href="{{Route('public.index')}}">Home</a></li>
            <li><a href="{{Route('public.blog')}}" class="active">Blog</a></li>
        </ol>
    </div>
</div>

<section class="post_section full_width_single">
    <div class="container">
        <div class="row post_section_inner">
            <div class="col-12">
                <div class="news_left_sidebar">
                    <div class="news_item news_details">
                        <h6><span>{{ date('d/m/Y h:m:s', strtotime($post->created_at)) }}</span> <a href="#">Autor : {{$post->user->name}}</a> <a href="#" class="investing">{{$post->category->name}}</a></h6>
                        <a href="" class="news_heding">{{$post->title}}</a>
                        <img class="img-fluid" src="{{ url("storage/".$post->image) }}" alt="{{$post->title}}" width="1110" height="537">
                        <p>{!!$post->content!!}</p>

                           <div class="share_row row justify-content-between">
                            <div class="col-sm-6 share_area">
                                <ul>
                                    <li>Compartilhe:</li>
                                    <li><a href="https://www.facebook.com/sharer.php?u={{url()->current()}}&t={{$post->title}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://plus.google.com/share?url={{url()->current()}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="https://twitter.com/home?status={{url()->current()}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6 back_to"><a href="{{Route('public.blog')}}"><i class="fa fa-arrow-left"></i>Voltar para o blog</a></div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
