@extends('welcome')

@section('content')
    <section id="blog" class="blog mt-5">
      <div class="container">
        <div class="row">
          <div class="entries">
            <article class="entry entry-single">
              <div class="entry-img">
                <img src="{{asset('storage/'.$post->photo->src)}}" data-aos="fade-up" data-aos-delay="200" alt="" class="img-fluid">
              </div>
              <h2 class="entry-title" data-aos="fade-up" data-aos-delay="200">
                <a href="blog-single.html">{{$post->title}}</a>
              </h2>
              <div class="entry-meta" data-aos="fade-up" data-aos-delay="200">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-clock  m-2"></i> <a><time datetime="2020-01-01"> {{$post->date}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots  m-2"></i> <a> {{$post->comments->count()}} {{__('admin.comments')}}</a></li>
                  <li class="d-flex align-items-center"><i class="m-2"></i> <a> {{$post->category->name}}</a></li>
                </ul>
              </div>
              <div class="entry-content" data-aos="fade-up" data-aos-delay="200">
                <blockquote>
                  <p>
                    {{$post->short_desc}}
                  </p>
                </blockquote>
                <p>
                  {{$post->long_desc}}
                </p>
              </div>
              <div class="entry-footer" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-tags"></i>
                <ul class="tags">
                  @foreach ($post->tags as $tag)
                    <li><a href="#">{{$tag->name}}</a></li>
                  @endforeach
                </ul>
              </div>
            </article>
            <div class="blog-comments" data-aos="fade-up" data-aos-delay="200">
              <h4 class="comments-count">{{$post->comments->count()}} Comments</h4>
              @foreach ($post->comments as $comment)
              <div class="dialogbox" data-aos="flip-up" data-aos-delay="200">
                <div class="body">
                  <span class="tip tip-left"></span>
                  <div class="message">
                    <div>
                      <span style="font-size: 11px;">{{$comment->created_at->diffForHumans()}}</span>
                    </div>
                    <span style="color: #34b7a7;">{{$comment->comment}}</span>
                  </div>
                </div>
              </div>
              {{-- <div id="comment-2" class="comment">
                <div class="d-flex">
                  <div>
                    <h2>
                      {{$comment->comment}}
                    </h2>
                    <time datetime="2020-01-01">{{$comment->created_at->diffForHumans()}}</time>
                  </div>
                </div>
              </div> --}}
              @endforeach
              <div class="reply-form">
                <h4>{{__('front.addComment')}}</h4>
                @guest
                  <p>
                    
                  </p>
                @else
                    <form action="{{route('comments.store',$post->id)}}" method="POST">
                      @csrf
                      <div class="row">
                        <div class="col form-group">
                          <textarea name="comment" class="form-control"></textarea>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">{{__('front.addComment')}}</button>
                    </form>
                @endguest
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
  <script>
    function showReplayForm(commentId){
      console.log('reply');
      // var x = document.getElementById(`replay-form-${commentId}`);
      // var input = document.getElementById(`replay-form-${commentId}`);

      // if(x.style.display === "none"){
      //   x.style.display = "block";
      //   input.innerText = '@';
      // }else{
      //   x.style.display = "none";
      // }
    }
    $(function (commentId){
      console.log('reply');
    });

  <script>
@endpush

