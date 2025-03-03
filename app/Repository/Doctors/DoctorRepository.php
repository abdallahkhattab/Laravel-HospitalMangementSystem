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
use App\Models\Appointment;
use App\Models\Image;

class DoctorRepository implements DoctorRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        return Doctor::with(['appointments', 'section', 'image'])
        ->get()
        ->map(function ($doctor) {
            $doctor->appointment_days = $doctor->appointments->pluck('name')->implode(',');
            return $doctor;
        });

    }

    public function create()
    {
        return Appointment::all();

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
            $doctor->save(); // Save before syncing relationships
    
            // Sync appointments (ensure many-to-many relationship works)
            if (isset($data['appointments']) && is_array($data['appointments'])) {
                $doctor->appointments()->sync($data['appointments']);
            }
    
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
    return Appointment::all();

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
            if(isset($data['appointments']) && is_array($data['appointments'])){
                $doctor->appointments()->sync($data['appointments']);
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

    $doctor->appointments()->detach();

    // Delete the doctor's image if it exists
    if ($doctor->image) {
        Storage::disk('public')->delete('doctors/' . $doctor->image->filename);
        $doctor->image()->delete();
    }

    // Delete the doctor
    return $doctor->delete();

}

public function filterBySection($sectionId)
{
    /*
    return Doctor::where('section_id', $sectionId)
        ->with('appointments', 'image')
        ->get()
        ->map(function ($doctor) {
            $doctor->appointment_days = $doctor->appointments->pluck('name')->implode(', ');
            return $doctor;
    });*/
    
    return Section::with(['doctors.appointments', 'doctors.image'])
    ->findOrFail($sectionId) // Get the section or fail if not found
    ->doctors
    ->map(function ($doctor) {
        $doctor->appointment_days = $doctor->appointments->pluck('name')->implode(', ');
        return $doctor;
    });
}


 
}
