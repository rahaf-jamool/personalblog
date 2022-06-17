<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory,HasTranslations;
    public $translatable = ['name', 'desc'];
    protected $primaryKey = 'id';
    protected $table = 'testimonials';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'name',
        'desc',
        'photo',
        'status',
        'slug'
    ];
}
