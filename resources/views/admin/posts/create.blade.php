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

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group m-4">
            <h2>Create Post</h2>
        </div>
        <div class="container">
            <div class="form-group col-md-6">
                <div class="picture-container">
                    <div class="picture">
                        <img src="" class="picture-src" id="wizardPicturePreview" height="200px" width="400px"
                            title=""/>
                        <input type="file" id="wizard-picture" name="photo"
                            class="form-control {{$errors->first('photo') ? "is-invalid" : "" }} ">
                        <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </div>
                    </div>
                    <h6>Select photo main</h6>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="user-image mb-3 text-center">
                    <div class="imgPreview"></div>
                </div>
                <div class="custom-file">
                    <input type="file" id="photos" name="photos[]" accept="image/*"
                            class="custom-file-input" multiple="multiple">
                    <label class="custom-file-label" for="photos">select photos</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('photos') }}
                    </div>
                </div>
            </div>
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
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_name">Title</label>
                        <input class="form-control {{ $errors->has('en_title') ? 'is-invalid' : '' }}" type="text"
                               name="en_title" id="en_title" value="{{ old('en_title', '') }}">
                        @if($errors->has('en_title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_title') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_client">Short Desc</label>
                        <input class="form-control {{ $errors->has('en_short_desc') ? 'is-invalid' : '' }}" type="text"
                               name="en_short_desc" id="en_short_desc" value="{{ old('en_short_desc', '') }}">
                        @if($errors->has('en_short_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_short_desc') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_desc">Long Desc</label>
                        <input class="form-control {{ $errors->has('en_long_desc') ? 'is-invalid' : '' }}" type="text"
                               name="en_long_desc" id="en_long_desc" value="{{ old('en_long_desc', '') }}">
                        @if($errors->has('en_long_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_long_desc') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="arabic" class="container tab-pane fade"><br>
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">Title</label>
                        <input class="form-control {{ $errors->has('ar_title') ? 'is-invalid' : '' }}" type="text"
                               name="ar_title" id="ar_title" value="{{ old('ar_title', '') }}">
                        @if($errors->has('ar_title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_title') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">Short Desc</label>
                        <input class="form-control {{ $errors->has('ar_short_desc') ? 'is-invalid' : '' }}" type="text"
                               name="ar_short_desc" id="ar_short_desc" value="{{ old('ar_short_desc', '') }}">
                        @if($errors->has('ar_short_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_short_desc') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">Long Desc</label>
                        <input class="form-control {{ $errors->has('ar_long_desc') ? 'is-invalid' : '' }}" type="text"
                               name="ar_long_desc" id="ar_long_desc" value="{{ old('ar_long_desc', '') }}">
                        @if($errors->has('ar_long_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_long_desc') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- category --}}
            <div class="form-group ml-4">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-7">
                    <select name='category' class="form-control {{$errors->first('category') ? "is-invalid" : "" }} "
                            id="category">
                        <option disabled selected>Choose one!</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <small class="form-text text-danger"> {{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group ml-4">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-7">
                    <input type="date" name='date' class="form-control {{$errors->first('date') ? "is-invalid" : "" }} " value="{{old('date')}}" id="date" >
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                </div>
            </div>
            {{-- tags --}}
            {{-- <div class="form-group ml-4">
                <label for="tag" class="col-sm-2 col-form-label">Tag</label>
                <div class="col-sm-7">
                    <select name='tag' class="form-control {{$errors->first('tag') ? "is-invalid" : "" }}"
                            id="category">
                        <option disabled selected>Choose one!</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tag')
                    <small class="form-text text-danger"> {{ $message }}</small>
                    @enderror
                </div>
            </div> --}}
            <div class="form-group ml-4">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        //Function to show image before upload
        $("#wizard-picture").change(function () {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        //image mobile
        // Prepare the preview for profile picture
        $("#wizard-picture1").change(function () {
            readURL1(this);
        });

        //Function to show image before upload
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#wizardPicturePreview1').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    // photos
    $(function(){
        // Multiple images preview with Javascript
        var multiImgPreview = function(input,imgPreviewPlaceholder){
            if (input.files){
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++){
                    var reader = new FileReader();
                    reader.onload = function(event){
                        $($.parseHTML('<img>')).attr('src',event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
        $('#photos').on('change', function(){
            multiImgPreview(this,'div.imgPreview');
        });
    });
    </script>
@endpush
