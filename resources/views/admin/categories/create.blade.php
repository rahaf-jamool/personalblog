@extends('layouts.master')

@section('styles')

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

@endsection

@section('content')

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group m-4">
            <h2>{{__('admin.createCategory')}}</h2>
        </div>
        <div class="container">
        <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach (config('app.languages') as $key => $lang)
                    <li class="nav-item">
                        <a class="nav-link @if ($loop->index == 0) active @endif" 
                            id="home-tab" role="tab" data-toggle="tab" aria-controls="home" 
                            aria-selected="true" href="#{{$key}}">{{$lang}}</a>
                    </li>
                @endforeach
                {{-- <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#english">{{__('admin.english')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#arabic">{{__('admin.arabic')}}</a>
                </li> --}}
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" id="myTabContent">
                @foreach (config('app.languages') as $key => $lang)
                    <div id="{{$key}}" class="container tab-pane fade @if ($loop->index == 0) show active in                    
                    @endif"><br>
                        <div class="form-group mt-2 col-sm-7">
                            <label class="required" for="name">{{__('admin.name')}}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="{{$key}}['name']" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-sm-7">
                            <label class="required" for="short_desc">{{__('admin.shortDesc')}}</label>
                            <input class="form-control {{ $errors->has('short_desc') ? 'is-invalid' : '' }}" type="text"
                                name="{{$key}}['short_desc']" id="short_desc" value="{{ old('short_desc', '') }}">
                            @if($errors->has('short_desc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('short_desc') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-sm-7">
                            <label class="required" for="long_desc">{{__('admin.longDesc')}}</label>
                            <input class="form-control {{ $errors->has('long_desc') ? 'is-invalid' : '' }}" type="text"
                                name="{{$key}}['long_desc']" id="long_desc" value="{{ old('long_desc', '') }}">
                            @if($errors->has('long_desc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('long_desc') }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{-- <div id="ar" class="container tab-pane fade"><br>
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">{{__('admin.name')}}</label>
                        <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text"
                               name="ar_name" id="ar_name" value="{{ old('ar_name', '') }}">
                        @if($errors->has('ar_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">{{__('admin.shortDesc')}}</label>
                        <input class="form-control {{ $errors->has('ar_short_desc') ? 'is-invalid' : '' }}" type="text"
                               name="ar_short_desc" id="ar_short_desc" value="{{ old('ar_short_desc', '') }}">
                        @if($errors->has('ar_short_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_short_desc') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">{{__('admin.longDesc')}}</label>
                        <input class="form-control {{ $errors->has('ar_long_desc') ? 'is-invalid' : '' }}" type="text"
                               name="ar_long_desc" id="ar_long_desc" value="{{ old('ar_long_desc', '') }}">
                        @if($errors->has('ar_long_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_long_desc') }}
                            </div>
                        @endif
                    </div>
                </div> --}}
            </div>
            <div class="form-group ml-4">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">{{__('admin.create')}}</button>
                </div>
            </div>
        </div>
    </form>
@endsection

