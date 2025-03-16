<?php

namespace App\Http\Controllers\Dashboard\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\interfaces\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $patientRepository;

    public function __construct(PatientRepositoryInterface $patient_repository)
    {

        $this->patientRepository = $patient_repository;
        
    }
    public function index()
    {
        return $this->patientRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return $this->patientRepository->create();
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        return $this->patientRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return $this->patientRepository->show($patient);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return $this->patientRepository->edit($patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        return $this->patientRepository->update($request,$patient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        return $this->patientRepository->destroy($patient);
    }
}
