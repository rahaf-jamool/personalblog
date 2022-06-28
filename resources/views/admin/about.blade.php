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
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form action="{{ route('about.update',1) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group m-4">
        <h2>Update About</h2>
    </div>
    <div class="container">
        <div class="form-group col-md-6">
            <div class="picture-container">
                <div class="picture">
                    <img src="{{ asset('storage/'.$about->photo->src) }}" class="picture-src"
                            id="wizardPicturePreview" height="200px" width="400px" title=""/>
                    <input type="file" id="wizard-picture" name="photo"
                                class="form-control {{$errors->first('photo') ? "is-invalid" : "" }} ">
                        <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </div>
                    </div>
                    <h6>Select photo</h6>
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
                    <label class="required" for="en_name">Name</label>
                    <input class="form-control {{ $errors->has('en_name') ? 'is-invalid' : '' }}" type="text"
                            name="en_name" id="en_name" value="{{ $about->getTranslation('name','en') }}">
                    @if($errors->has('en_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('en_name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-7">
                    <label class="required" for="en_short_desc">Short Desc</label>
                    <input class="form-control {{ $errors->has('en_short_desc') ? 'is-invalid' : '' }}" type="text"
                            name="en_short_desc" id="en_short_desc" value="{{ $about->getTranslation('short_desc','en') }}">
                    @if($errors->has('en_short_desc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('en_short_desc') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-7">
                    <label class="required" for="en_long_desc">Long Desc</label>
                    <input class="form-control {{ $errors->has('en_long_desc') ? 'is-invalid' : '' }}" type="text"
                            name="en_long_desc" id="en_long_desc" value="{{ $about->getTranslation('long_desc','en') }}">
                    @if($errors->has('en_long_desc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('en_long_desc') }}
                        </div>
                    @endif
                </div>
            </div>
            <div id="arabic" class="container tab-pane fade"><br>
                <div class="form-group col-sm-7">
                    <label class="required" for="ar_name">Name</label>
                    <input class="form-control {{ $errors->has('ar_name') ? 'is-invalid' : '' }}" type="text"
                            name="ar_name" id="ar_name" value="{{ $about->getTranslation('name','ar') }}">
                    @if($errors->has('ar_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ar_name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-7">
                    <label class="required" for="ar_short_desc">Short Desc</label>
                    <input class="form-control {{ $errors->has('ar_short_desc') ? 'is-invalid' : '' }}" type="text"
                            name="ar_short_desc" id="ar_short_desc" value="{{ $about->getTranslation('short_desc','ar') }}">
                    @if($errors->has('ar_short_desc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ar_short_desc') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-sm-7">
                    <label class="required" for="ar_long_desc">Long Desc</label>
                    <input class="form-control {{ $errors->has('ar_long_desc') ? 'is-invalid' : '' }}" type="text"
                            name="ar_long_desc" id="ar_long_desc" value="{{ $about->getTranslation('long_desc','ar') }}">
                    @if($errors->has('ar_long_desc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ar_long_desc') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap p-3">
        <div class="form-group col-sm-6">
            <label for="gmail" class="col-sm-2 col-form-label">Gmail</label>
            <input class="form-control {{$errors->first('gmail') ? "is-invalid" : "" }} " type="email" name='gmail'
                value="{{old('gmail') ? old('gmail') : $about->gmail}}" id="gmail" >
            <div class="invalid-feedback">
                {{ $errors->first('gmail') }}
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <input class="form-control {{$errors->first('address') ? "is-invalid" : "" }} " type="text" name='address'
                value="{{old('address') ? old('address') : $about->address}}" id="address" >
            <div class="invalid-feedback">
                {{ $errors->first('address') }}
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <input class="form-control {{$errors->first('phone') ? "is-invalid" : "" }} " type="text" name='phone'
                value="{{old('phone') ? old('phone') : $about->phone}}" id="phone" >
            <div class="invalid-feedback">
                {{ $errors->first('phone') }}
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
            <input class="form-control {{$errors->first('twitter') ? "is-invalid" : "" }} " type="text" name='twitter'
                value="{{old('twitter') ? old('twitter') : $about->twitter}}" id="twitter" >
            <div class="invalid-feedback">
                {{ $errors->first('twitter') }}
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
            <input class="form-control {{$errors->first('facebook') ? "is-invalid" : "" }} " type="text" name='facebook'
                value="{{old('facebook') ? old('facebook') : $about->facebook}}" id="facebook" >
            <div class="invalid-feedback">
                {{ $errors->first('facebook') }}
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="instegram" class="col-sm-2 col-form-label">Instegram</label>
            <input class="form-control {{$errors->first('instegram') ? "is-invalid" : "" }} " type="text"
                name='instegram' value="{{old('instegram') ? old('instegram') : $about->instegram}}" id="instegram">
            <div class="invalid-feedback">
                {{ $errors->first('instegram') }}
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
            <input class="form-control {{$errors->first('youtube') ? "is-invalid" : "" }} " type="text" name='youtube'
                value="{{old('youtube') ? old('youtube') : $about->youtube}}" id="youtube" >
            <div class="invalid-feedback">
                {{ $errors->first('youtube') }}
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label for="job" class="col-sm-2 col-form-label">Job</label>
            <input class="form-control {{$errors->first('job') ? "is-invalid" : "" }} " type="text" name='job'
                value="{{old('job') ? old('job') : $about->job}}" id="job" >
            <div class="invalid-feedback">
                {{ $errors->first('job') }}
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

@push('scripts')
<script>
// Prepare the preview for profile picture
$("#wizard-picture").change(function() {
    readURL(this);
});
//Function to show image before upload
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
