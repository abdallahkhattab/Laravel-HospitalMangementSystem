<?php
namespace App\interfaces\Doctors;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;

interface DoctorRepositoryInterface
{
    public function index();
    public function create();
    public function store(DoctorRequest $request);
    public function edit();
    public function update($request ,$doctor);
    public function destroy($doctor);
    public function filterBySection($sectionId);
    
}