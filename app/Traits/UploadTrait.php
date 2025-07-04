<?php
namespace App\Traits;

use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadTrait{

    public function verifyAndStoreImage(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type) {
        if ($request->hasFile($inputname)) {
            // Validate file
            if (!$request->file($inputname)->isValid()) {
                throw new \Exception('Invalid image file.');
            }

            $photo = $request->file($inputname);
            $name = Str::slug($request->input('name', 'image')); // Fallback if 'name' is missing
            $filename = $name . '_' . Carbon::now()->timestamp . '.' . $photo->getClientOriginalExtension();

            // Store Image
            $path = $photo->storeAs($foldername, $filename, $disk);

            // Save image reference in database
            Image::create([
                'filename' => $filename,
                'path' => $path, // Save file path
                'imageable_id' => $imageable_id,
                'imageable_type' => $imageable_type,
            ]);

            return $path;
        }

        return null;
    }

    public function verifyAndStoreImageForeach($varforeach , $foldername , $disk, $imageable_id, $imageable_type) {

        // insert Image
        $Image = new Image();
        $Image->filename = $varforeach->getClientOriginalName();
        $Image->imageable_id = $imageable_id;
        $Image->imageable_type = $imageable_type;
        $Image->save();
        return $varforeach->storeAs($foldername, $varforeach->getClientOriginalName(), $disk);
    }

    public function Delete_attachment($disk,$path,$id){

        Storage::disk($disk)->delete($path);
        image::where('imageable_id',$id)->delete();

    }
}
