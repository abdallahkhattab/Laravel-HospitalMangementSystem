<?php

namespace App\Repository\Doctors;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Hash;
use App\interfaces\Doctors\DoctorRepositoryInterface;
use App\Traits\UploadTrait;

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
                    'upload_image',
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
}
