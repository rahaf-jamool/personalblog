@extends('welcome')

@section('content')
    <div class="container mt-4">
        <div class="row m-auto">
            <div class="card mb-4" style="width: 100%">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.youtube.com/embed/{{$singleVideo->items[0]->id}}" width="100%" height="600" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="card-body">
                    <h5>{{$singleVideo->items[0]->snippet->title}}</h5>
                    <p class="text-secondary">{{__('front.publishedAt')}} {{date('d m y' , strtotime($singleVideo->items[0]->snippet->publishedAt))}}</p>
                    <p>{{$singleVideo->items[0]->snippet->description}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection