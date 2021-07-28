<?php


namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Image;

Trait ImageTrait
{


    protected function saveImage($photo,$folder){
        $new_name = $photo->hashName();
        Image::make($photo)->resize(210, 210)->save(public_path($folder . $new_name));
        return $new_name;
    }


    protected function deleteImage($photo,$folder){
        $old_name = $photo;
        Storage::disk('uploads')->delete($folder . $old_name);
    }


}
