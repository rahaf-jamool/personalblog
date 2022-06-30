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

    <form action="{{ route('admin.user.update',$user->id) }}" method="POST">
        @csrf

        <div class="form-group m-4">
            <h2>{{__('admin.Uuser')}}</h2>
        </div>

        <div class="container">
            <div class="form-group ml-5">
                <label for="name" class="col-sm-2 col-form-label">{{__('admin.name')}}</label>
                <div class="col-sm-9">
                    <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} "
                           value="{{old('name') ? old('name') : $user->name}}" id="name">
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                </div>
            </div>
            <div class="form-group ml-5">
                <label for="username" class="col-sm-2 col-form-label">{{__('admin.username')}}</label>
                <div class="col-sm-9">
                    <input type="text" name='username' class="form-control {{$errors->first('username') ? "is-invalid" : "" }} "
                           value="{{old('username') ? old('name') : $user->username}}" id="username">
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                </div>
            </div>
            <div class="form-group ml-5">
                <label for="email" class="col-sm-2 col-form-label">{{__('admin.email')}}</label>
                <div class="col-sm-9">
                    <input type="email" name='email'
                           class="form-control {{$errors->first('email') ? "is-invalid" : "" }} "
                           value="{{old('email') ? old('email') : $user->email}}" id="email">
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>
            </div>
            <div class="form-group ml-5">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">{{__('admin.update')}}</button>
                </div>
            </div>
        </div>
    </form>
@endsection
