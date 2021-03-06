@extends('layouts.master')

@section('styles')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<h1 class="h3 mb-2 text-gray-800">{{__('admin.blogs')}}</h1>

@if (session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-success" href="{{route('posts.create')}}">{{__('admin.Cblog')}}</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('admin.no')}}</th>
                        <th>{{__('admin.image')}}</th>
                        <th>{{__('admin.title')}}</th>
                        <th>{{__('admin.desc')}}</th>
                        <th>status</th>
                        <th>{{__('admin.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php
                $no=0;
                @endphp

                @foreach ($posts as $post)
                    <tr class="c">
                        <td class="">{{ ++$no }}</td>
                        <td class="">
                            @if ($post->photo == '')
                                <img src="{{ asset('img/noimage.jpg') }}" alt="" style="height: 100px; width: 100px">
                            @else
                                <img src="{{ asset('storage/'.$post->photo->src) }}" alt="" style="height: 100px; width: 100px">
                            @endif
                        </td>
                        <td class="">{{ $post->title }}</td>
                        {{-- <td class="col-sm-2">{{ $post->category->name }}</td> --}}
                        <td class="">{{ $post->short_desc }}</td>
                        <td class="text-center">
                            <input type="checkbox" class="toggle-class" data-id="{{$post->id}}" 
                                data-toggle="toggle" data-on="Active" data-off="Not Active" 
                                data-onstyle="success" data-offstyle="danger" {{$post->status == true ? 'checked' : ''}}>
                        </td>
                        <td class="">
                            <a href="{{route('posts.edit', [$post->id])}}" class="btn btn-info btn-sm">{{__('admin.edit')}}</a>
                            <a class="btn btn-primary btn btn-sm" href="{{route('posts.gallery', [$post->id])}}">{{__('admin.gallery')}}</a>
                            {{-- <form method="POST" class="d-inline" onsubmit="return confirm('Move post to trash ?')" action="{{route('posts.destroy', $post->id)}}">
                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                                <input type="submit" value="{{__('admin.trash')}}" class="btn btn-danger btn-sm">
                            </form> --}}
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

<script>
    $(function() {
      $('#toggle-two').bootstrapToggle({
        on: 'Enabled',
        off: 'Disabled'
      });
    });
    $('.toggle-class').on('change',function(){
      var status = $(this).prop('checked') == true ? 1 : 0;
      var post_id = $(this).data('id');
      $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '{{route("change.status")}}',
        data: {
          'status' : status , 
          'post_id' : post_id,
        },
        success: function(data){
            console.log(data);
        }
      });
    });
</script>
@endpush
