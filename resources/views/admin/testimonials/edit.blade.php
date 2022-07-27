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

    <form action="{{ route('testimonials.update',$testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group m-4">
            <h2>{{__('admin.Utestimonial')}}</h2>
        </div>

        <div class="">
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
                <div id="english" class="tab-pane active show in"><br>
                    {{-- name --}}
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_name">{{__('admin.name')}}</label>
                        <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text"
                               name="en_name" id="en_name" value="{{ $testimonial->getTranslation('name','en') }}">
                        @if($errors->has('en_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_name') }}
                            </div>
                        @endif
                    </div>
                    {{-- desc --}}
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_client">{{__('admin.desc')}}</label>
                        <input class="form-control {{ $errors->has('en_desc') ? 'is-invalid' : '' }}" type="text"
                               name="en_desc" id="en_desc" value="{{ $testimonial->getTranslation('desc','en') }}">
                        @if($errors->has('en_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_desc') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="arabic" class="tab-pane fade"><br>
                    {{-- name --}}
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">{{__('admin.name')}}</label>
                        <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text"
                               name="ar_name" id="ar_name" value="{{ $testimonial->getTranslation('name','ar') }}">
                        @if($errors->has('ar_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_name') }}
                            </div>
                        @endif
                    </div>
                    {{-- desc --}}
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">{{__('admin.desc')}}</label>
                        <input class="form-control {{ $errors->has('ar_desc') ? 'is-invalid' : '' }}" type="text"
                               name="ar_desc" id="ar_desc" value="{{ $testimonial->getTranslation('desc','ar') }}">
                        @if($errors->has('ar_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_desc') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">{{__('admin.update')}}</button>
                </div>
            </div>
        </div>
    </form>
@endsection
