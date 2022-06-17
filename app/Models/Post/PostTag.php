<?php

namespace App\Models\Post;

use App\Models\Taq\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'post_tags';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'post_id',
        'tag_id',
    ];
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
