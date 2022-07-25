@extends('welcome')

@section('content')
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
    <section class="container mt-5">
            <div class="site-content">
                <div class="posts">
                    @foreach ($posts as $post)
                        <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                    <img src="{{asset('storage/' .$post->photo->src)}}" class="img" alt="blog1">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;{{$post->category->name}}</span>
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;{{$post->date}}</span>
                                    <span>{{$post->comments->count()}} Commets</span>
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
                    <div>
                      <h3 class="sidebar-title">{{__('front.search')}}</h3>
                      <div class="sidebar-item search-form">
                        <form action="{{route('blog.search')}}" method="GET">
                          <input type="text" class="form-control" placeholder="{{__('front.searchTitle')}}" name="search">
                          <button type="submit"><i class="bi bi-search"></i></button>
                        </form>
                      </div>
                    </div>
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
                                    <span>{{$latestPost->comments->count()}} {{__('admin.comments')}}</span>
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