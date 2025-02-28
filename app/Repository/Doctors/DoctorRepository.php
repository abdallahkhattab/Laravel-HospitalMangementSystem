<?php
namespace App\Repository\Doctors;

use App\Http\Requests\DoctorRequest;
use App\interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Models\Section;

class DoctorRepository implements DoctorRepositoryInterface
{

    public function index(){
        $doctors = Doctor::all();
        return view('Dashboard.Doctors.index',compact('doctors'));
    }

  
    public function store($data):Doctor{

        return Doctor::create($data);
    }

}