@extends('layouts.master')

@section('styles')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<h1 class="h3 mb-2 text-gray-800">{{__('admin.tags')}}</h1>

@if (session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{route('tags.create')}}" class="btn btn-success">{{__('admin.Ctag')}}</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('admin.no')}}</th>
                        <th>{{__('admin.name')}}</th>
                        <th>{{__('admin.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $no=0;
                @endphp

                @foreach ($tags as $tag)
                    <tr class="">
                        <td class="">{{ ++$no }}</td>
                        <td class="">{{ $tag->name }}</td>
                        <td class="">
                            <a href="{{route('tags.edit', [$tag->id])}}" class="btn btn-info btn-sm">{{__('admin.edit')}}</a>
                            <form method="POST" action="{{route('tags.destroy', [$tag->id])}}" class="d-inline" onsubmit="return confirm('Delete this category permanently?')">
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
