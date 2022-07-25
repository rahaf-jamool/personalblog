@extends('welcome')

@section('content')
    <section class="site-title mb-5">
        <div class="site-background" data-aos="fade-up" data-aos-delay="100">
            <h3>{{$about->name}}</h3>
            <h1>{{$about->short_desc}}</h1>
            <button class="btn"><a style="color: #000" href="{{route('home.about')}}">{{__('front.about')}}</a></button>
        </div>
    </section>
    {{-- <section>
        <div class="post">
            <div class="container">
                <h1>Category</h1>
                <div class="owl-carousel owl-theme blog-post">
                    @foreach ($categories as $category)
                        <div class="blog-content" data-aos="fade-right" data-aos-delay="200">
                        <img src="{{asset('front/assets/Blog-post/post-1.jpg')}}" alt="post-1">
                        <div class="blog-title">
                            <h3>{{$category->name}}</h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> --}}
    <section id="breadcrumbs" class="breadcrumbs mt-5">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>{{__('front.blogs')}}</h2>
            <p>{{__('front.blogDesc')}}</p>
          </div>
        </div>
      </div>
    </section>
    <section class="container">
            <div class="site-content">
                <div class="posts">
                    @foreach ($post as $post)
                        <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                    <img src="{{asset('storage/' .$post->photo->src)}}" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;{{$post->category->name}}</span>
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;{{$post->date}}</span>
                                    <span>{{$post->comments->count()}} {{__('admin.comments')}}</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">
                                    {{$post->title}}
                                </a>
                                <p>
                                    {{$post->short_desc}}
                                </p>
                                <button class="btn post-btn"><a href="{{route('home.single-blog', [$post->id])}}">{{__('front.readMore')}}</a> &nbsp; <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    <hr>
                    @endforeach
                    <div class="pagination flex-row">
                        <a href="#"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="pages">{{$posts->appends(Request::all())->links()}}</a>
                        {{-- <a href="#" class="pages">2</a>
                        <a href="#" class="pages">3</a> --}}
                        <a href="#"><i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <aside class="sidebar">
                    <div class="category mt-5">
                        <h2>{{__('front.categories')}}</h2>
                        <ul class="category-list">
                            @foreach ($categories as $category)
                            <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                                <a href="#">{{$category->name}}</a>
                                <span>( {{$category->posts->count()}} )</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="popular-post">
                        <h2>{{__('front.recentPosts')}}</h2>
                        @foreach ($posts->take(3) as $latestPost)
                        <div class="post-content" data-aos="flip-up" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                    <img src="{{asset('storage/' . $latestPost->photo->src)}}" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;{{$latestPost->created_at->diffForHumans()}}</span>
                                    <span>{{$latestPost->comments->count()}} Commets</span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#">{{$latestPost->title}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="popular-tags">
                        <h2>{{__('front.tags')}}</h2>
                        <div class="tags flex-row">
                            @foreach ($tags as $tag)
                              <span class="tag" data-aos="flip-up" data-aos-delay="100">{{$tag->name}}</span>  
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
    </section>
@endsection

@push('scripts')
    <script>
        const responsive = {
    0: {
        items: 1
    },
    320: {
        items: 1
    },
    560: {
        items: 2
    },
    960: {
        items: 3
    }
}

$(function ()  {
  // Owl Carousel
  var owl = $(".owl-carousel");
  owl.owlCarousel({
    items: 3,
    margin: 10,
    loop: true,
    nav: true
  });
} );

$(document).ready(function () {

    $nav = $('.nav');
    $toggleCollapse = $('.toggle-collapse');

    /** click event on toggle menu */
    $toggleCollapse.click(function () {
        $nav.toggleClass('collapse');
    })

    // owl-crousel for blog
    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 3000,
        dots: false,
        nav: true,
        navText: [$('.owl-navigation .owl-nav-prev'), $('.owl-navigation .owl-nav-next')],
        responsive: responsive
    });


    // click to scroll top
    $('.move-up span').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    })

    // AOS Instance
    AOS.init();

});
    </script>
@endpush