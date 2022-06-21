<?php

namespace App\Models\Comment;

use App\Models\CommentReplay\CommentReplay;
use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'comments';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'post_id',
        'comment',
    ];
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function replies(){
        return $this->hasMany(CommentReplay::class);
    }
}
