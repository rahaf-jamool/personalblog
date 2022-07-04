@extends('welcome')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>{{__('front.blogs')}}</h2>
            <p>{{__('front.blogDesc')}}</p>
          </div>
        </div>
      </div>
    </section>
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            @if (count($posts) > 0)
              @foreach ($posts as $post)
                <article class="entry">
                  <div class="entry-img">
                    <img src="{{asset('storage/'.$post->photo->src)}}" alt="" class="img-fluid">
                  </div>
                  <h2 class="entry-title">
                    <a href="blog-single.html">{{$post->title}}</a>
                  </h2>
                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"> <i class="bi bi-person m-2"></i> {{$post->created_at->diffForHumans()}} </li>
                      <li class="d-flex align-items-center"> <i class="bi bi-clock m-2"></i><time datetime="2020-01-01"> {{$post->date}} </time></li>
                      <li class="d-flex align-items-center"> <i class="bi bi-chat-dots m-2"></i> {{$post->comments->count()}} </li>
                    </ul>
                  </div>
                  <div class="entry-content">
                    <p>
                      {{$post->long_desc}}
                    </p>
                    <div class="read-more">
                        <a class="read" href="{{route('home.single-blog', [$post->id])}}">{{__('front.readMore')}}</a>
                    </div>
                  </div>
                </article>              
              @endforeach
            @else
            <div class="unavaible_product">
              <img src="{{asset('img/notavailable_prev_ui.png')}}">
              <h2>Ops... Posts not available.</h2> 
            </div>
            @endif
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <h3 class="sidebar-title">{{__('front.search')}}</h3>
              <div class="sidebar-item search-form">
                <form action="{{route('blog.search')}}" method="GET">
                  <input type="text" class="form-control" placeholder="{{__('front.searchTitle')}}" name="search">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div>
              <h3 class="sidebar-title">{{__('front.categories')}}</h3>
              <div class="sidebar-item categories">
                <ul>
                  @foreach ($categories as $category)
                    <li><a href="#">{{$category->name}}</a><span> ( {{$category->posts->count()}} )</span></li>
                  @endforeach
                </ul>
              </div>
              <h3 class="sidebar-title">{{__('front.recentPosts')}}</h3>
              <div class="sidebar-item recent-posts">
                @foreach ($posts->take(3) as $latestPost)
                <div class="post-item clearfix">
                  <img src="{{asset('storage/' . $latestPost->photo->src)}}" alt="">
                  <h4><a>{{$latestPost->title}}</a></h4>
                  <time>{{$latestPost->created_at->diffForHumans()}}</time>
                </div>
                 @endforeach
              </div>

              {{-- <h3 class="sidebar-title">{{__('front.tags')}}</h3>
              <div class="sidebar-item tags">
                <ul>
                  @foreach ($tags as $tag)
                    <li><a href="#">{{$tag->name}}</a></li>
                  @endforeach
                </ul>
              </div> --}}

            </div>
          </div>
          <div class="justify-content-center d-flex mt-5">
            {{$posts->appends(Request::all())->links()}}
          </div>
        </div>
      </div>
    </section>
@endsection