<?php

namespace App\Models\Post;

use App\Models\Category\Category;
use App\Models\Comment\Comment;
use App\Models\Like\Like;
use App\Models\Taq\Taq;
use App\Models\User;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory,HasTranslations,HasPhoto;
    public $translatable = ['title', 'short_desc', 'long_desc'];
    protected $primaryKey = 'id';
    protected $table = 'posts';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'short_desc',
        'long_desc',
        'slug',
        'image',
        'views',
        'status',
        'date',
    ];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'author_id');
    }
    public function tags()
    {
        return $this->hasMany(PostTag::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
