<?php

namespace App\Models\Playlist;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'playlists';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'channelId',
        'playlistId',
        'title',
        'desc',
        'thumbnails',
        'publishedAt',
    ];
}
