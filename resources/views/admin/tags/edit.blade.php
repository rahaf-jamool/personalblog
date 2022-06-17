@extends('layouts.admin')

@section('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('tags.update',$tag->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group m-4">
            <h2>Update tag</h2>
        </div>

        <div class="container">
        <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#english">English</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#arabic">Arabic</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="english" class="container tab-pane active"><br>
                    {{-- name --}}
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_name">Name</label>
                        <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text"
                               name="en_name" id="en_name" value="{{ $category->getTranslation('name','en') }}">
                        @if($errors->has('en_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_name') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="arabic" class="container tab-pane fade"><br>
                    {{-- name --}}
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">Name</label>
                        <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text"
                               name="ar_name" id="ar_name" value="{{ $category->getTranslation('name','ar') }}">
                        @if($errors->has('ar_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_name') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group ml-3">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection
