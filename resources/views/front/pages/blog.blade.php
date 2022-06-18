@extends('welcome')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Blog</h2>
            <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
          </div>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
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
                    @php
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
                    @endforeach
                      <span class="like" data-postid="{{$post->id}}"><i class="bi bi-hand-thumbs-up"></i> {{$like_count}}</span>
                      <span class="dislike" data-postid="{{$post->id}}"><i class="bi bi-hand-thumbs-down-fill"> {{$dislike_count}}</i></span>
                      <a class="read" href="{{route('home.single-blog', [$post->id])}}">Read More</a>
                  </div>
                </div>
            </article><!-- End blog entry -->              
            @endforeach

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">
              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  @foreach ($categories as $category)
                    <li><a href="#">{{$category->name}}</a><span> ( {{$category->posts->count()}} )</span></li>
                  @endforeach
                </ul>
                  {{-- <li><a href="#">Lifestyle <span>(12)</span></a></li>--}}
              </div>
              <!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="{{asset('img/blog/blog-recent-1.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{asset('img/blog/blog-recent-2.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{asset('img/blog/blog-recent-3.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{asset('img/blog/blog-recent-4.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="{{asset('img/blog/blog-recent-5.jpg')}}" alt="">
                  <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->
@endsection