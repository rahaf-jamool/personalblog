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

    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group m-4">
            <h2>{{__('admin.Ublog')}}</h2>
        </div>

        <div class="">
            <div class="form-group col-md-6">
                <div class="picture-container">
                    <div class="picture">
                        @if ($post->photo == '')
                            <img src="" class="picture-src"
                                id="wizardPicturePreview" height="200px" width="400px" title="" accept="image/*"/>
                        @else
                            <img src="{{ asset('storage/'.$post->photo->src) }}" class="picture-src"
                                id="wizardPicturePreview" height="200px" width="400px" title="" accept="image/*"/>
                        @endif
                        <input type="file" id="wizard-picture" name="photo"
                                   class="form-control {{$errors->first('photo') ? "is-invalid" : "" }} ">
                        <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </div>
                        <h6>{{__('admin.Selectphotomain')}}</h6>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="user-image mb-3 text-center">
                    <div class="imgPreview"></div>
                </div>
                <div class="custom-file">
                    <input type="file" id="photos" name="photos[]" accept="image/*"
                            class="custom-file-input" multiple="multiple">
                    <label class="custom-file-label" for="">{{__('admin.Selectphoto')}}</label>
                    <div class="invalid-feedback">
                        {{ $errors->first('photos') }}
                    </div>
                </div>
            </div>
        <!-- Nav tabs -->
            <ul class="nav nav-tabs ml-3 mt-4">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#english">{{__('admin.english')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#arabic">{{__('admin.arabic')}}</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content ml-2">
                <div id="english" class="tab-pane active show in"><br>
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_name">{{__('admin.title')}}</label>
                        <input class="form-control {{ $errors->has('en_title') ? 'is-invalid' : '' }}" type="text"
                               name="en_title" id="en_title" value="{{ $post->getTranslation('title','en') }}">
                        @if($errors->has('en_title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_title') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_client">{{__('admin.shortDesc')}}</label>
                        <input class="form-control {{ $errors->has('en_short_desc') ? 'is-invalid' : '' }}" type="text"
                               name="en_short_desc" id="en_short_desc" value="{{ $post->getTranslation('short_desc','en') }}">
                        @if($errors->has('en_short_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_short_desc') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="en_desc">{{__('admin.longDesc')}}</label>
                        <input class="form-control {{ $errors->has('en_long_desc') ? 'is-invalid' : '' }}" type="text"
                               name="en_long_desc" id="en_long_desc" value="{{ $post->getTranslation('long_desc','en') }}">
                        @if($errors->has('en_long_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('en_long_desc') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div id="arabic" class="tab-pane fade"><br>
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">{{__('admin.title')}}</label>
                        <input class="form-control {{ $errors->has('ar_title') ? 'is-invalid' : '' }}" type="text"
                               name="ar_title" id="ar_title" value="{{ $post->getTranslation('title','ar') }}">
                        @if($errors->has('ar_title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_title') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">{{__('admin.shortDesc')}}</label>
                        <input class="form-control {{ $errors->has('ar_short_desc') ? 'is-invalid' : '' }}" type="text"
                               name="ar_short_desc" id="ar_short_desc" value="{{ $post->getTranslation('short_desc','ar') }}">
                        @if($errors->has('ar_short_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_short_desc') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-sm-7">
                        <label class="required" for="title">{{__('admin.longDesc')}}</label>
                        <input class="form-control {{ $errors->has('ar_long_desc') ? 'is-invalid' : '' }}" type="text"
                               name="ar_long_desc" id="ar_long_desc" value="{{ $post->getTranslation('long_desc','ar') }}">
                        @if($errors->has('ar_long_desc'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ar_long_desc') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- category --}}
            <div class="form-group">
                <label for="category" class="col-sm-2 col-form-label">{{__('admin.category')}}</label>
                <div class="col-sm-7">
                    <select name='category' class="form-control {{$errors->first('category') ? "is-invalid" : "" }} "
                            id="category">
                        <option disabled selected>{{__('admin.Chooseone')}}!</option>
                        @foreach ($categories as $category)
                            <option
                                {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <small class="form-text text-danger"> {{ $message }}</small>
                    @enderror
                </div>
            </div>
            {{-- tags --}}
            <div class="form-group">
                <label for="tag" class="col-sm-2 col-form-label">Tag</label>
                <div class="col-sm-7">
                    <select name='tags[]' class="form-control {{$errors->first('tag') ? "is-invalid" : "" }} select2" 
                        multiple id="tag">
                        <option disabled>Choose one!</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                @foreach ($post->tags as $tag_premit)
                                    @if ($tag_premit->id == $tag->id)
                                        selected
                                    @endif
                                @endforeach >{{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tag')
                    <small class="form-text text-danger"> {{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="date" class="col-sm-2 col-form-label">{{__('admin.date')}}</label>
                <div class="col-sm-7">
                    <input type="date" name='date' class="form-control {{$errors->first('date') ? "is-invalid" : "" }} " value="{{ $post->date }}" id="date" >
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">{{__('admin.update')}}</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')

    <script>
        // Prepare the preview for profile picture
        $("#wizard-picture").change(function () {
            readURL(this);
        });

        //Function to show image before upload
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
                for (i = 0; i <= filesAmount; i++){
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
