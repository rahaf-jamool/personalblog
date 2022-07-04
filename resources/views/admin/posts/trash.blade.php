@extends('layouts.master')

@section('styles')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<h1 class="h3 mb-2 text-gray-800">{{__('admin.trashBlog')}}</h1>

@if (session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ __('admin.no') }}</th>
                        <th>{{ __('admin.title') }}</th>
                        <th>{{ __('admin.category') }}</th>
                        <th>{{ __('admin.action') }}</th>
                    </tr>
                </thead>
                <tbody>

                @php
                $no=0;
                @endphp

                @foreach ($post as $post)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <form method="POST" action="{{route('posts.restore', $post->id)}}" class="d-inline">
                                @csrf
                                <input type="submit" value="{{__('admin.restore')}}" class="btn btn-success btn-sm">
                            </form>
                            <form method="POST" action="{{route('posts.deletePermanent', $post->id)}}" class="d-inline" onsubmit="return confirm('Delete this post permanently?')">
                                @csrf

                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="{{ __('admin.delete') }}" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

@endpush
