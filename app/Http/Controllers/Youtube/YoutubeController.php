<?php

namespace App\Http\Controllers\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Playlist\Playlist;
use App\Models\PlaylistVideo\PlaylistVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class YoutubeController extends Controller
{   
    public function getPlayListFront(){
        $key = env('YOUTUBE_KEY');
        $base_url = env('BASE_URL');
        $channel_id = env('CHANNEL_ID');
        $maxResult = 1000;
        
        $api_url = $base_url."playlists?order=date&part=snippet&channelId=".$channel_id."&maxResult=".$maxResult."&key=".$key;
        $response = Http::get($api_url);
        $playlists = json_decode($response);
        File::put(storage_path() . '/app/public/playlists.json', $response->body());
        
        $playlist_data = (array)json_decode($response->body());
        $pageInfo = (array)$playlist_data['pageInfo'];
        $pageCount = $pageInfo['totalResults'];

        if ($pageCount > 0) {
            $items = (array)$playlist_data['items'];
            foreach ($items as $key => $counter) {
                $playlist_data = (array)$items[$key];
                // getting data start
                $playlist_id = $playlist_data['id'];
                $snippet = (array)$playlist_data['snippet'];

                $publishedAt = $snippet['publishedAt'];
                $channelId = $snippet['channelId'];
                $title = $snippet['title'];
                $desc = $snippet['description'];

                $thumbnails = (array)$snippet['thumbnails'];

                $json_thumbs = [];
                foreach ($thumbnails as $typekey => $type) {
                    $type_data = (array)$type;
                    $json_thumbs[] = ['type' => $typekey, 'url' => $type_data['url']];
                }

                Playlist::updateOrCreate(
                ['playlistId' => $playlist_id],
                [
                    'channelId' => $channelId,
                    'playlistId' => $playlist_id,
                    'title' => $title,
                    'desc' => $desc,
                    'thumbnails' => json_encode($json_thumbs),
                    'publishedAt' => $publishedAt
                ]
                );
            }
        }
        return view('front.pages.youtube.channel',compact('playlists'));
    }
    public function getPlayListVideosFront($id){
        $key = env('YOUTUBE_KEY');
        $base_url = env('BASE_URL');
        $channel_id = env('CHANNEL_ID');
        $maxResult = 1000;

        $api_url = $base_url . "playlistItems?part=snippet&maxResults=" . $maxResult . "&playlistId=" . $id . "&key=" . $key;
        $response = Http::get($api_url);
        $playlistVideos = json_decode($response->body());
        File::put(storage_path() . '/app/public/playListVideos.json', $response->body());
        
        $playlists = Playlist::select('playlistId')->orderBy('publishedAt','ASC')->get();
        
        if (count($playlists) > 0) {
            foreach ($playlists as $playlist) {
                $playlistId = $playlist->playlistId;
                $api_url = $base_url . "playlistItems?part=snippet&maxResults=" . $maxResult . "&playlistId=" . $playlistId . "&key=" . $key;

                $response = Http::get($api_url);
                $playlist_data = (array)json_decode($response->body());
                $items = (array)$playlist_data['items'];

                if (count($items) > 0) {
                    foreach ($items as $item) {
                        $video_data = (array)$item;
                        $etag = $video_data['etag'];
                        $otherId = $video_data['id'];
                        $snippet = (array)$video_data['snippet'];

                        $publishedAt = $snippet['publishedAt'];
                        $title = $snippet['title'];
                        $desc = $snippet['description'];

                        $thumbnails = (array)$snippet['thumbnails'];

                        $json_thumbs = [];
                        foreach ($thumbnails as $typekey => $type) {
                            $type_data = (array)$type;
                            $json_thumbs[] = ['type' => $typekey, 'url' => $type_data['url']];
                        }

                        $resourceId = (array)$snippet['resourceId'];
                        $videoId = $resourceId['videoId'];

                        PlaylistVideos::updateOrCreate(
                        ['videoId' => $videoId],
                        [
                            'playlistId' => $playlistId,
                            'etag' => $etag,
                            'otherId' => $otherId,
                            'title' => $title,
                            'desc' => $desc,
                            'thumbnails' => json_encode($json_thumbs),
                            'videoId' => $videoId,
                            'publishedAt' => $publishedAt
                        ]
                        );
                    }
                }
            }
        }   
        return view('front.pages.youtube.channelVideos',compact('playlistVideos'));
    }
    public function watchVideoFront($id){
        $key = env('YOUTUBE_KEY');
        $base_url = env('BASE_URL');
        $part = 'snippet';

        $api_url = $base_url . "videos?part=". $part ."&id=". $id . "&key=" . $key;
        $response = Http::get($api_url);
        $singleVideo = json_decode($response->body());
        return view('front.pages.youtube.watchVideo',compact('singleVideo'));
    }
    public function getPlayListVideoAdmin()
    {
        $PlaylistVideos = PlaylistVideos::get();
        return view('admin.myChannel.index',compact('PlaylistVideos'));
    }
    public function changFeature(Request $request){
        $PlaylistVideo = PlaylistVideos::find($request->PlaylistVideo_id);
        $PlaylistVideo->feature = $request->feature;
        $PlaylistVideo->save();
        return response()->json(['success','Feature Change Successfuly']);  
    }
    // // youtube refresh
    public function getPlayList()
    {
        $key = env('YOUTUBE_KEY');
        $base_url = env('BASE_URL');
        $channel_id = env('CHANNEL_ID');
        $maxResult = 1000;
        
        $api_url = $base_url."playlists?order=date&part=snippet&channelId=".$channel_id."&maxResults=".$maxResult."&key=".$key;
        $response = Http::get($api_url);
        $playlist_data = (array)json_decode($response->body());
       
        $pageInfo = (array)$playlist_data['pageInfo'];
        $pageCount = $pageInfo['totalResults'];
        
        if($pageCount > 0){
            $items = (array)$playlist_data['items'];
            foreach($items as $key => $counter)
            {
                $playlist_data = (array)$items[$key];
                // getting data start
                $playlist_id = $playlist_data['id'];
                $snippet = (array)$playlist_data['snippet'];

                $publishedAt = $snippet['publishedAt'];
                $channelId = $snippet['channelId'];
                $title = $snippet['title'];
                $desc = $snippet['description'];

                $thumbnails = (array)$snippet['thumbnails'];

                $json_thumbs = [];
                foreach($thumbnails as $typekey => $type)
                {
                    $type_data = (array)$type;
                    $json_thumbs[] = ['type' => $typekey,'url' => $type_data['url']];
                }

                Playlist::updateOrCreate(
                    ['playlistId' => $playlist_id],
                    [
                        'channelId' => $channelId,
                        'playlistId' => $playlist_id,
                        'title' => $title,
                        'desc' => $desc,
                        'thumbnails' => json_encode($json_thumbs),
                        'publishedAt' => $publishedAt
                    ]
                );
            }
            return response()->json(['success' => true, 'msg' => 'Data Updated Successfuly']);
        }
        else
        {
            return response()->json(['error' => true, 'msg' => 'Data Not Found!']);
        }
    }
    public function getVideos(){
        $key = env('YOUTUBE_KEY');
        $base_url = env('BASE_URL');
        $channel_id = env('CHANNEL_ID');
        $maxResult = 1000;

        $playlists = Playlist::select('playlistId')->orderBy('publishedAt','ASC')->get();
        
        if(count($playlists) > 0){
            foreach($playlists as $playlist){
                $playlistId = $playlist->playlistId;

                $api_url = $base_url."playlistItems?part=snippet&maxResults=".$maxResult."&playlistId=".$playlistId."&key=".$key;
        
                $response = Http::get($api_url);
                $playlist_data = (array)json_decode($response->body());
                $items = (array)$playlist_data['items'];

                if(count($items) > 0){
                    foreach($items as $item)
                    {
                        $video_data = (array)$item;
                        $etag = $video_data['etag']; 
                        $otherId = $video_data['id'];
                        $snippet = (array)$video_data['snippet'];

                        $publishedAt = $snippet['publishedAt'];
                        $title = $snippet['title'];
                        $desc = $snippet['description'];

                        $thumbnails = (array)$snippet['thumbnails'];

                        $json_thumbs = [];
                        foreach($thumbnails as $typekey => $type)
                        {
                            $type_data = (array)$type;
                            $json_thumbs[] = ['type' => $typekey,'url' => $type_data['url']];
                        }

                        $resourceId = (array)$snippet['resourceId'];
                        $videoId = $resourceId['videoId'];

                        PlaylistVideos::updateOrCreate(
                        ['videoId' => $videoId],
                        [
                            'playlistId' => $playlistId,
                            'etag' => $etag,
                            'otherId' => $otherId,
                            'title' => $title,
                            'desc' => $desc,
                            'thumbnails' => json_encode($json_thumbs),
                            'videoId' => $videoId,
                            'publishedAt' => $publishedAt
                        ]
                        );
                    }
                }
            }
            return response()->json(['success' => true, 'msg' => 'Data Updated Successfuly']);
        }else{
            return response()->json(['error' => true, 'msg' => 'Playlist Not Found!']);
        } 
    }
    public function searchHistory(Request $request){
        $key = env('YOUTUBE_KEY');
        $base_url = env('BASE_URL');
        $channel_id = env('CHANNEL_ID');
        $maxResult = 1000;

        $search = '';
        
        if(isset($request->que)){
            $search = $request->que;
        }
        $api_url = $base_url."search?part=snippet&channelId=".$channel_id."&maxResults=".$maxResult."&q=".$search."&key=".$key;

        if(isset($request->after)){
            $after_date = $request->after."T00:00:00Z";
            $api_url = $base_url."search?part=snippet&channelId=".$channel_id."&maxResults=".$maxResult."&publishedAfter=".$after_date."&key=".$key;
        }

        $response = Http::get($api_url);
        $result = (array)json_decode($response->body());
        return response()->json(['success' => true, 'data' => $result]);
    }
}
