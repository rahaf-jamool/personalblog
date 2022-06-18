<?php

namespace App\Models\Tag;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name'];
    protected $primaryKey = 'id';
    protected $table = 'tags';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'name',
        'post_id',
        'slug'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
