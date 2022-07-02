@extends('layouts.public.app')
@section('content')

@include('layouts.public.sliders')

<section class="post_section">
    <div class="container">
        <div class="row post_section_inner">

                <div class="col-lg-12 left_sidebar">
                    <div class="row tranding_post_area">


                        <div class="col-12 tranding_tittle">
                            <h2>Posts recentes</h2>
                            <a href="{{Route('public.blog')}}">Ver mais <i class="fa fa-arrow-right"></i></a>
                        </div>
                        @foreach ($posts_limit4 as $post)
                        <div class="col-md-6">
                            <div class="tranding_post">
                                <a href="{{Route('public.post',$post->slug)}}" class="post_img">
                                    <img src="{{ url("storage/".$post->image) }}" alt="{{$post->title}}" width="650" height="235">
                                    <span class="tag_btn">{{$post->category->name}}</span>
                                </a>
                                <div class="post_content">
                                    <a href="{{Route('public.post',$post->slug)}}" class="t_heding">{{$post->title}}</a>
                                    <h6>{{ date('d/m/Y h:m:s', strtotime($post->created_at)) }} <span>|</span><a href="#">{{$post->user->name}}</a></h6>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>


        </div>
    </div>
</section>

@endsection
