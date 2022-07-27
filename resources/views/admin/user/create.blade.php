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

    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group m-4">
            <h2>{{__('admin.Cuser')}}</h2>
        </div>
        <div class="">
            <div class="form-group ml-5">
                <label for="name" class="col-sm-2 col-form-label">{{__('admin.name')}}</label>
                <div class="col-sm-9">
                    <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} "
                           value="{{old('name')}}" id="name">
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                </div>
            </div>
            <div class="form-group ml-5">
                <label for="username" class="col-sm-2 col-form-label">{{__('admin.username')}}</label>
                <div class="col-sm-9">
                    <input type="text" name='username' class="form-control {{$errors->first('username') ? "is-invalid" : "" }} "
                           value="{{old('username')}}" id="username">
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                </div>
            </div>
            <div class="form-group ml-5">
                <label for="email" class="col-sm-2 col-form-label">{{__('admin.email')}}"</label>
                <div class="col-sm-9">
                    <input type="email" name='email'
                           class="form-control {{$errors->first('email') ? "is-invalid" : "" }} "
                           value="{{old('email')}}" id="email">
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>
            </div>
            <div class="form-group ml-5">
                <label for="password" class="col-sm-2 col-form-label">{{__('admin.password')}}</label>
                <div class="col-sm-9">
                    <input type="password" name='password'
                           class="form-control {{$errors->first('password') ? "is-invalid" : "" }} "
                           value="{{old('password')}}" id="password">
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>
            </div>
            <div class="form-group ml-5">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">{{__('create')}}</button>
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
    </script>
@endpush
