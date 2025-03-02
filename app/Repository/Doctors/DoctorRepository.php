<?php

namespace App\Repository\Doctors;

use App\Models\Doctor;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Image;

class DoctorRepository implements DoctorRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        return Doctor::all();
    }

    public function create()
    {
        return Section::all();
    }

    public function store(DoctorRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            
            // Create the doctor record
            $doctor = new Doctor();
            $doctor->fill($data);
            $doctor->password = Hash::make($data['password']);
            $doctor->appointments = isset($data['appointments']) ? implode(',', $data['appointments']) : '';
            $doctor->save();

            // Upload image (if exists)
            if ($request->hasFile('photo')) {
                $this->verifyAndStoreImage(
                    $request,
                    'photo',
                    'doctors',
                    'public',
                    $doctor->id,
                    Doctor::class
                );
            }

            DB::commit();
            return $doctor;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception('Failed to create doctor: ' . $e->getMessage());
        }
    }



    public function edit(){
     return Section::all();
    }

    public function update($request,$doctor)
    {
        DB::beginTransaction();
        try {
           
    
            // Get validated data from the request
            $data = $request->validated();
    
    
            // Update password only if provided
            if (isset($data['password']) && !empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }
    
            // Update appointments if provided
            if (isset($data['appointments'])) {
                $data['appointments'] = implode(',', (array) $data['appointments']);
            }
    
            // Update the doctor record
            $doctor->update($data);
    
            // Handle photo upload if provided
            if ($request->hasFile('photo')) {
                // Optionally delete the old photo if it exists
                if ($doctor->image) {
                    Storage::disk('public')->delete('doctors/' . $doctor->image->filename);
                    $doctor->image()->delete();
                }
    
                $this->verifyAndStoreImage(
                    $request,
                    'photo',
                    'doctors',
                    'public',
                    $doctor->id,
                    Doctor::class
                );
            }
    
            DB::commit();
            $doctor->refresh(); 
    
            // Return the updated doctor with a success response
            return response()->json([
                'message' => 'Doctor updated successfully',
                'doctor' => $doctor// Fetch the latest data
            ], 200);
    
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception('Unable to update doctor profile. Please try again later.');
        }
    }

    public function destroy($doctor){
        return $doctor->delete();
        if($doctor->image){
            Storage::disk('public')->delete('doctors/'.$doctor->image->filename);
            $doctor->image()->delete();
        }
    }

 
}
