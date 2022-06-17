<?php

namespace App\Models\Photo;

use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory,HasPhoto;
    protected $primaryKey = 'id';
    protected $table = 'photos';
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $fillable = [
        'src','type'
        
    ];
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($photo){
            if(static::where('src',$photo->src)->exists()){
                Storage::disk('public')->delete($photo->src);
            }
        });
    }
    public function photable(){
        return $this->morphTo();
    }
}
