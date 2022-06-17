<?php

namespace App\Models\Tag;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'tags';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'name',
        'slug'
    ];
    public function Posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
