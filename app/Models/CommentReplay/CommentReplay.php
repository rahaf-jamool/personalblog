<?php

namespace App\Models\CommentReplay;

use App\Models\Comment\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReplay extends Model
{
    use HasFactory;
    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
