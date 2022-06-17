<?php

namespace App\Traits;

use App\Models\Photo\Photo;

trait HasPhoto
{
    public static function bootHasPhoto()
    {
        static::deleting(function ($model){
           $model->deleteImage(); 
        });
    }
    
    /**
    * @return mixed
    */
    public function photos(){
        return $this->morphMany(Photo::class,'photable')->where('type','gallery');
    }
    
    /** 
    * @return mixed
    */
    public function photo(){
        return $this->morphOne(Photo::class,'photable')->where('type','main');
    } 

    /** 
    * Replaces the current image with a new one
    * @parm $path
    * @parm string $type
    * @return static
    */
    public function storeImage($path , $type = 'main')
    {
        $photo = $this->photo()->create(['src' => $path , 'type' => $type]);
        return $photo;
    }
    
    /** 
    * Replaces the current image with a new one
    * @parm $path
    * @parm string $type
    */
    public function updateImage($path , $type = 'main')
    {
        if ($type == 'main' && $this->photo){
            $this->photo->delete();
        }
        else if ($type == 'gallery' && $this->photos){
            $this->photos->delete();
        }
        $this->storeImage($path);
    }
    
    /*
    * Deletes all images
    */
    public function deleteImages()
    {
        $this->photos->each(function ($photo){
           $photo->delete();
        });
    }
    
    public function deleteImage()
    {
        if($this->photo){
            $this->photo->delete();
        }elseif($this->photos){
            $this->photos->each(function ($photo){
                $photo->delete();
            });
        }
    }
    
}
