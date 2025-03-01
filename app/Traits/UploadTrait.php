<?php
namespace App\Traits;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
}
