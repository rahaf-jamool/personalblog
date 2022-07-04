<?php

namespace App\Models\Post;

use App\Models\Category\Category;
use App\Models\Comment\Comment;
use App\Models\Like\Like;
use App\Models\Tag\Tag;
use App\Models\User;
use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory,HasTranslations,HasPhoto;
    use SoftDeletes;
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
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }
    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class, 'roles_permissions','role_id', 'permission_id','id','id');

    // }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
