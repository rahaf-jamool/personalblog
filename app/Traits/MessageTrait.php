<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait MessageTrait
{
    public function SuccessMessage($route,$msg )
    {
        return redirect ()->route ($route)
            ->with('success', 'Data ' . $msg . ' successfully');
    }

    public function ErrorMessage($route,$msg )
    {
        return redirect ()->route ($route)
            ->with('error', 'Data ' . $msg . 'failed');
    }

    public function uploadImage ($image,$path)
    {
        $filename = $image->store($path, 'public');
        return $filename;
    }
    
    public function updateUploadImage ($new_image,$path)
    {
        $new_image = request()->file('image');
        if($new_image){
            if($new_image && file_exists(storage_path('app/public/' . $new_image->image))){
                    Storage::delete('public/'. $new_image->image);
                }
                $new_image_path = $new_image->store($path, 'public');
                request()->image = $new_image_path;
        }
        $filename = $new_image->store($path, 'public');
        return $filename;
    }
}
