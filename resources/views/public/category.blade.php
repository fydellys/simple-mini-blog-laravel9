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

<section class="post_section news_post_2">
    <div class="container">
        <div class="row post_section_inner">
            <div class="col-lg-8 left_sidebar ls_2">
                <div class="row feature_post_area">
                    @if ($posts->count() == 0)
                    <div class="col-12">
                        <div class="alert alert-danger">
                        Nenhum post foi publicado nessa categoria.
                        </div>
                    </div>
                    @endif

                    @foreach ($posts as $post)
                    <div class="col-12">
                        <div class="belarus_items">
                            <img src="{{ url("storage/".$post->image) }}" alt="{{$post->title}}" width="770" height="338">
                            <div class="belarus_content">
                                <h6 class="wow fadeInUp">{{ date('d/m/Y h:m:s', strtotime($post->created_at)) }}</h6>
                                <a href="{{Route('public.post',$post->slug)}}" class="heding wow fadeInUp" data-wow-delay="0.2s">{{$post->title}}</a>
                                <a href="#" class="wow fadeInUp tag_btn" data-wow-delay="0.4s">{{$post->category->name}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach




                </div>
            </div>


            <div class="col-lg-4 right_sidebar">

                <div class="categories">
                    <h3>Categorias</h3>
                    <ul class="cpost_categories">
                        @foreach ($categories as $category)
                        <li><a href="{{Route('public.category',$category->name)}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection
