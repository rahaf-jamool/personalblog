<?php

namespace App\Models\PlaylistVideo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistVideos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'playlist_videos';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'playlistId',
        'etag',
        'otherId',
        'title',
        'desc',
        'thumbnails',
        'videoId',
        'publishedAt'
    ];
}
