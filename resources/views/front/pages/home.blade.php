@extends('welcome')

@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
        <h1>{{$about->name}}</h1>
        <h2>{{$about->short_desc}}</h2>
        <a href="{{route('home.about')}}" class="btn-about">{{__('front.about')}}</a>
        </div>
    </section>

    <section id="services" class="services ">
      <div class="container">

        <div class="section-title pt-5" data-aos="fade-up">
          <h2>{{__('admin.blogs')}}</h2>
        </div>

        <div id="bricks" class="bricks">
                <div class="masonry" data-aos="fade-up">
                    <div class="bricks-wrapper" data-animate-block>
                        <div class="grid-sizer"></div>
                        @foreach ($post as $post)
                            <article class="brick entry" data-animate-el>
                                <div class="entry__thumb">
                                    <a class="thumb-link">
                                        <img src="{{asset('storage/' .$post->photo->src)}}"  alt="">
                                    </a>
                                </div>
                                <div class="entry__text">
                                    <div class="entry__header">
                                        <div class="entry__meta">
                                            <span class="cat-links">
                                                <a href="{{route('home.single-blog', [$post->id])}}">{{$post->title}}</a>
                                            </span>
                                            <span class="byline">
                                                By:
                                                <a href="#">{{$post->category->name}}</a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="entry__excerpt">
                                        <p>
                                            {{$post->short_desc}}
                                        </p>
                                    </div>
                                    <a class="entry__more-link" href="{{route('home.single-blog', [$post->id])}}">Read More</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
      </div>
    </section>
@endsection