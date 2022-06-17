<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory,HasTranslations;
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
    ];
}
