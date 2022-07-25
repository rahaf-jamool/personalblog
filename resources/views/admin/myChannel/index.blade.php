@extends('layouts.master')

@section('styles')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
    .small-img-row{
        display: flex;
        /* background: #efefef; */
        margin: 20px 0;
        align-items: center;
        border-radius: 6px;
        overflow: hidden;
        width: 100%;
    }
    .small-img{
        position: relative;
    }
    .small-img img{
        width: 150px;
    }
    .small-img-row p{
        margin-left: 20px;
        color: #707070;
        line-height: 22px;
        font-size: 15px;
        width: 50rem;
    }
    .small-img .play-btn{
        width: 60px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        cursor: pointer;
    }
    .video-player{
        width: 80%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        display: none;
    }
    video:focus{
        outline: none;
    }
    .close-btn{
        position:absolute;
        top: 10px;
        right: 10px;
        width: 30px;
        cursor: pointer;
    }
</style>
@endsection

@section('content')

<h1 class="h3 mb-2 text-gray-800">My channel</h1>

@if (session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="container">
    <div class="row">
        @foreach ($PlaylistVideos as $PlaylistVideo)
            <div class="small-img-row">   
                <div class="small-img">
                    {{$PlaylistVideo->thumbnails}}
                    <br>
                    <img src="{{asset('img/blog/blog-1.jpg')}}" alt="" height="100%">
                    <img src="{{asset('img/play_prev_ui.png')}}" class="play-btn">
                </div>
                <p>
                    {{$PlaylistVideo->title}}
                </p>
                <input type="checkbox" class="toggle-class"  data-id="{{$PlaylistVideo->id}}" style="margin: auto 20px;"
                    data-toggle="toggle" data-on="Feature" data-off="Not Feature" data-onstyle="success" 
                    data-offstyle="danger" {{$PlaylistVideo->feature == true ? 'checked' : ''}}>
            </div>        
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
      $('#toggle-two').bootstrapToggle({
        on: 'Enabled',
        off: 'Disabled'
      });
    });
    $('.toggle-class').on('change',function(){
      var feature = $(this).prop('checked') == true ? 1 : 0;
      var PlaylistVideo_id = $(this).data('id');
      $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '{{route("change.feature")}}',
        data: {
          'feature' : feature , 
          'PlaylistVideo_id' : PlaylistVideo_id,
        },
        success: function(data){
            console.log(data);
        }
      });
    });
</script>
@endpush