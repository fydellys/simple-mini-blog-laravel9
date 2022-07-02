
<section class="home_banner_area home_banner_2">
    <div class="container">
        <div class="row home_banner_inner">

            <div class="carousel slide banner_slider bs_2 col-12" data-ride="carousel">
                <div class="carousel-inner">

                    @php $i=0; @endphp
                    @foreach ($posts_limit3 as $post)
                    @php $i++; @endphp

                    <div class="carousel-item @if ($i == 1) active @endif">
                        <img src="{{ url("storage/".$post->image) }}" alt="{{$post->title}}" width="1170" height="480">
                        <div class="slider_caption">
                            <h6 class="wow fadeInUp animated">{{$post->title}}</h6>
                            <a href="{{ Route('public.post',$post->slug) }}" class="wow fadeInUp animated heding" data-wow-delay="0.2s">{{$post->description}}</a>
                            <a href="{{ Route('public.post',$post->slug) }}" class="wow fadeInUp animated tag_btn" data-wow-delay="0.5s">{{$post->category->name}}</a>
                        </div>
                    </div>
                    @endforeach

                </div>
                <ol class="carousel-indicators">
                    @php $i=-1; @endphp
                    @foreach ($posts_limit3 as $post)
                    @php $i++; @endphp
                    <li data-target=".banner_slider" data-slide-to="{{$i}}" @if ($i == 0) class="active" @endif></li>
                    @endforeach
                </ol>
            </div>

        </div>
    </div>
</section>


