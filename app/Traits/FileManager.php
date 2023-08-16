<?php


namespace App\Traits;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait FileManager
{
    public function deleteUserImage($filename): void
    {
        File::delete(public_path('uploads/'.$filename));
    }

    public function saveUserImage($image, $disk): string
    {
        // Process the image
        $img = Image::make($image)->resize(350, 350)->encode('jpeg');
        $name = Str::random(50).'_'.$image->getClientOriginalName();;
        Storage::disk($disk)->put($name, $img);
        return $name;
    }

}
