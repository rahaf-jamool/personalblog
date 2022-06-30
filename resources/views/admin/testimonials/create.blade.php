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

    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group m-4">
            <h2>{{__('admin.Ctestimonial')}}</h2>
        </div>
        <div class="container">
        <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#english">{{__('admin.english')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#arabic">{{__('admin.arabic')}}</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="english" class="container tab-pane fade active show in"><br>
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_name">{{__('admin.name')}}</label>
                        <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text"
                               name="en_name" id="en_name" value="{{ old('en_name', '') }}">
                        @if($errors->has('en_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_client">{{__('admin.desc')}}</label>
                        <input class="form-control {{ $errors->has('en_desc') ? 'is-invalid' : '' }}" type="text"
                               name="en_desc" id="en_desc" value="{{ old('en_desc', '') }}">
                        @if($errors->has('en_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_desc') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="arabic" class="container tab-pane fade"><br>
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
                        <label class="required" for="title">{{__('admin.desc')}}</label>
                        <input class="form-control {{ $errors->has('ar_desc') ? 'is-invalid' : '' }}" type="text"
                               name="ar_desc" id="ar_desc" value="{{ old('ar_desc', '') }}">
                        @if($errors->has('ar_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_desc') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group ml-4">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">{{__('admin.create')}}</button>
                </div>
            </div>
        </div>
    </form>
@endsection

