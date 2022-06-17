<?php

namespace App\Models\Like;

use App\Models\Post\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'likes';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'post_id',
        'like'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
