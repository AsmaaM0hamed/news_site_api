<?php
namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
trait image_upload
{
    public function StoreImage(Request $request, $inputname , $foldername , $disk)
    {

        if( $request->hasFile( $inputname ) ) {

            $photo = $request->file($inputname);
            $name = Str::slug($request->input('name'));
            $filename = $name. '.' . $photo->getClientOriginalExtension();

            $request->file($inputname)->storeAs($foldername, $filename, $disk);

            return $filename;
        }

        return null;

    }

    public function DeletImage($disk,$path)
    {
        storage::disk($disk)->delete($path);

    }
}
