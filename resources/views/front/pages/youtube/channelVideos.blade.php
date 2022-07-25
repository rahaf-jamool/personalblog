@extends('welcome')

@section('styles')
<style>
/* .title {
  	width: 100%;
  	max-width: 854px;
  	margin: 0 auto;
}
.caption {
  	width: 100%;
  	max-width: 854px;
  	margin: 0 auto;
  	padding: 20px 0;
}
.vid-main-wrapper {
  	width: 100%;
  	max-width: 1100px;
  	min-width: 440px;
  	background: #fff;
  	margin: 0 auto;
}
.vid-container {
	position: relative;
	padding-bottom: 52%;
	padding-top: 30px; 
	height: 0; 
    width:70%;
    float:left;
}		 
.vid-container iframe,
.vid-container object,
.vid-container embed {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	min-height: 360px;
}
.vid-list-container {
	width: 30%;
    height:360px;
	overflow: hidden;
    float:right;
}
.vid-list-container:hover, .vid-list-container:focus {
    overflow-y: auto;
}
ol#vid-list {
    margin:0;
    padding:0;
    background: #222;
}
ol#vid-list li {
	list-style: none;
}
ol#vid-list li a {
    text-decoration: none;
    background-color: #222;
    height:55px;
    display:block;
    padding:10px;
}
ol#vid-list li a:hover {
    background-color:#666666
}
.vid-thumb {
    float:left;
	margin-right: 8px;
}
.active-vid { 
    background:#3A3A3A;
}
#vid-list .desc {
	color: #CACACA;
	font-size: 13px;
	margin-top:5px;
}
@media (max-width: 624px) {
    .caption {
        margin-top: 40px;
    }
    .vid-list-container {
        padding-bottom: 20px;
    }
} */
</style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach ($playlistVideos->items as $key => $item)
                <div class="col-4">
                    <a href="{{route('home.watchVideo', $item->snippet->resourceId->videoId)}}">
                        <div class="card mb-4">
                            <img src="{{$item->snippet->thumbnails->medium->url}}" alt="" class="img-fluid">
                            <div class="card-body">
                                <h5 class="card-titled">{{\Illuminate\Support\Str::limit($item->snippet->title , $limit = 50 , $end = '...')}}</h5>
                            </div>
                            <div class="card-footer text-muted">
                                {{__('front.publishedAt')}} {{date('d m y' , strtotime($item->snippet->publishedAt))}}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection