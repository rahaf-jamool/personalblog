@extends('welcome')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Blog</h2>
            <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
          </div>
        </div>
      </div>
    </section>

    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
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
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{$post->created_at->diffForHumans()}}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$post->date}}</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">{{$post->comments->count()}}</a></li>
                  </ul>
                </div>
                <div class="entry-content">
                  <p>
                    {{$post->long_desc}}
                  </p>
                  <div class="read-more">
                    {{-- @php
                      $like_count = 0;
                      $dislike_count = 0;

                      $like_status = "btn-secondry";
                      $dislike_status = "btn-secondry";
                    @endphp
                    @foreach ($post->likes as $like)
                      @php
                        if($like->like == 1)
                          $like_count++;
                        if($like->like == 0)
                          $dislike_count++;
                      @endphp
                    @endforeach --}}
                      {{-- <span class="like" data-postid="{{$post->id}}"><i class="bi bi-hand-thumbs-up"></i> {{$like_count}}</span> --}}
                      {{-- <span class="dislike" data-postid="{{$post->id}}"><i class="bi bi-hand-thumbs-down-fill"> {{$dislike_count}}</i></span> --}}
                      <a class="read" href="{{route('home.single-blog', [$post->id])}}">{{__('front.readMore')}}</a>
                  </div>
                </div>
            </article>              
            @endforeach
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
                  <time>{{$post->created_at->diffForHumans()}}</time>
                </div>
                 @endforeach
              </div>

              <h3 class="sidebar-title">{{__('front.tags')}}</h3>
              <div class="sidebar-item tags">
                <ul>
                  @foreach ($tags as $tag)
                    <li><a href="#">{{$tag->name}}</a></li>
                  @endforeach
                </ul>
              </div>

            </div>
          </div>

          <div class="justify-content-center d-flex mt-5">
            {{$posts->appends(Request::all())->links()}}
          </div>
        </div>
      </div>
    </section>
@endsection