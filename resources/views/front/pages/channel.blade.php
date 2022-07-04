@extends('welcome')

@section('content')

<section id="channel" class="channel">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>My Channel</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="playlist-title">
          <h2>Play List</h2>
        </div>
        <div class="playlist">
          @foreach ($playlists as $playlist)
            <div class="item">
              <div class="overlay">{{$playlist->title}}</div>
              <img src="{{asset('img/about.jpg')}}" alt="Avatar" class="image" style="width:100%">
              <div class="middle">
                <div class="text"><a href="{{route('home.getVideos', [$playlist->id])}}">Play All</a></div>
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