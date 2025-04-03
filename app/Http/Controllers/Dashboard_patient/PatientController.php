<?php

namespace App\Http\Controllers\Dashboard_patient;

use App\Models\Ray;
use App\Models\Laboratorie;
use Illuminate\Http\Request;
use App\Models\ReceiptAccount;
use App\Http\Controllers\Controller;
use App\interfaces\Patient_Dashboard\PatientsRepositoryInterface;
use App\Models\single_invoice;

class PatientController extends Controller
{
    public function invoices(){

        $invoices = single_invoice::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.invoices',compact('invoices'));
    }

    public function laboratories(){

        $laboratories = Laboratorie::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.laboratories',compact('laboratories'));
    }
/*
    public function viewLaboratories($id){

        $laboratorie = Laboratorie::findorFail($id);
        if($laboratorie->patient_id !=auth()->user()->id){
            return redirect()->route('404');
        }
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.patient_details', compact('laboratorie'));
    }*/

    public function rays(){

        $rays = Ray::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.rays',compact('rays'));
    }

    /*
    public function viewRays($id)
    {
        $rays = Ray::findorFail($id);
        if($rays->patient_id !=auth()->user()->id){
            return redirect()->route('404');
        }
        return view('Dashboard.dashboard_RayEmployee.invoices.patient_details', compact('rays'));
    }*/
    /*

    public function payments(){

        $payments = ReceiptAccount::where('patient_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_patient.payments',compact('payments'));
    }*/
}
