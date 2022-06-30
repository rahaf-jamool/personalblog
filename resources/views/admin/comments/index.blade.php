@extends('layouts.master')

@section('styles')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<h1 class="h3 mb-2 text-gray-800">{{__('admin.comments')}}</h1>

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
                        <th>{{__('admin.no')}}</th>
                        <th>{{__('admin.comment')}}</th>
                        <th>{{__('admin.post')}}</th>
                        <th>{{__('admin.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $no=0;
                @endphp

                @foreach ($comments as $comment)
                    <tr class="col-sm-12">
                        <td class="col-sm-1">{{ ++$no }}</td>
                        <td class="col-sm-2">{{ $comment->comment }}</td>
                        <td class="col-sm-2">{{ $comment->post->title }}</td>
                        <td class="col-sm-3">
                            <form method="POST" action="{{route('comments.destroy', [$comment->id])}}" class="d-inline" onsubmit="return confirm('Delete this category permanently?')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" value="{{__('admin.delete')}}" class="btn btn-danger btn-sm">
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
