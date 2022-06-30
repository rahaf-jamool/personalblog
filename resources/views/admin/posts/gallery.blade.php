@extends('layouts.master')

@section('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="container">
        <div class="card-header">
            <h1>{{__('admin.gallerblog')}}</h1>
            <span> {{$post->title}}</span>
        </div>
        <div class="gallery">
            @foreach ($post->photos as $photo)
                <div class="card m-2">
                <img class="card-img-top" style="width: 200px;height: 200px" src="{{asset('storage/'.$photo->src)}}" alt="Card image cap">
                <div class="text-center m-2"> 
                    <form method="POST" action="{{route('posts.gallery.destroy', $photo->id)}}" class="d-inline" onsubmit="return confirm('Delete this images permanently?')">
                        @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" value="Delete" class="btn btn-outline-danger btn-sm">
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
