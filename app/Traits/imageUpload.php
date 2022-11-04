<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait imageUpload
{
    public function ProductImageUpload($query) // Taking input image as parameter
    {
        $image_name = Str::random(20);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = env('UPLOAD_FOLDER');    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path.$image_full_name;
        $query->move($upload_path,$image_full_name);
 
        return $image_full_name; // Just return image
    }
}
