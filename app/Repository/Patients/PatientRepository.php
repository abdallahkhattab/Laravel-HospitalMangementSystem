<?php
namespace App\Repository\Patients;

use App\Models\Service;
use Flasher\Laravel\Facade\Flasher;
use App\interfaces\Patients\PatientRepositoryInterface;
use App\Models\Patient;

class PatientRepository implements PatientRepositoryInterface
{

   public function index()
   {
    
    $patients = Patient::all();
    return view('Dashboard.Patients.index',compact('patients'));
    
   }

    public function create()
    {
        return view('Dashboard.Patients.create');
    }

    public function edit($patient){

    }

    public function store($request)
    {

        $data = $request->validated();

        Patient::create($data);

        return redirect()->route('patients.index')
        ->with('success', trans('Dashboard/Patient.Patient.created_successfully'));
        
    }

    public function update($request,$patient)
    {

       

        
    }


    public function destroy($patient)
    {
        
        
    }
}