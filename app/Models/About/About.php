<?php

namespace App\Models\About;

use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory,HasTranslations,HasPhoto;
    public $translatable = ['name', 'short_desc', 'long_desc'];
    protected $primaryKey = 'id';
    protected $table = 'abouts';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'name',
        'short_desc',
        'long_desc',
        'phone', 
        'twitter',
        'facebook',
        'youtube',
        'instegram',
        'gmail',
        'address',
        'job'
    ];
}
