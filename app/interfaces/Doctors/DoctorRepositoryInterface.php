<?php
namespace App\interfaces\Doctors;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;

interface DoctorRepositoryInterface
{
    public function index();


    public function store(array $data):Doctor;
    
}