@extends('welcome')

@section('content')

<section id="channel" class="channel mt-5">
    <div class="container">
        <div class="section-title" data-aos="fade-up" data-aos-delay="200">
          <h2>{{__('front.mychannel')}}</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="playlist-title mt-5" data-aos="fade-up" data-aos-delay="200">
          <h2>{{__('front.playlists')}}</h2>
        </div>
        <div class="playlist" data-aos="fade-up" data-aos-delay="200">
          @foreach ($playlists->items as $key => $item)
            <div class="item" data-aos="flip-up" data-aos-delay="200">
              <div class="overlay">{{$item->snippet->title}}</div>
              <img src="{{$item->snippet->thumbnails->medium->url}}" alt="Avatar" class="image" style="width:100%" data-aos="zoom-in" data-aos-delay="200">
              <div class="middle">
                <div class="text"><a href="{{route('home.getVideos', [$item->id])}}">{{__('front.viewAll')}}</a></div>
              </div>
            </div>
          @endforeach
        </div>  
    </div>
</section>
@endsection

@push('scripts')
<script>
  
</script>
@endpush