<?php

namespace App\Models\Category;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name', 'short_desc', 'long_desc'];
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'name',
        'short_desc',
        'long_desc',
        'slug'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
