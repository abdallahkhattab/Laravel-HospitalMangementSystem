<?php

namespace App\Repository\Patients;

use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\PatientAccount;
use App\Models\ReceiptAccount;
use App\Models\single_invoice;

class PatientRepository implements PatientRepositoryInterface
{
    public function index()
    {
        try {
            $patients = Patient::all();
            return view('Dashboard.Patients.index', compact('patients'));
        } catch (\Exception $e) {
            Log::error('Failed to fetch patients: ' . $e->getMessage());
            return back()->with('error', 'Unable to load patients.');
        }
    }

    public function create()
    {
        try {
            return view('Dashboard.Patients.create');
        } catch (\Exception $e) {
            Log::error('Failed to load patient create form: ' . $e->getMessage());
            return back()->with('error', 'Unable to load patient create form.');
        }
    }

    public function show($patient){

        $patient->load(['singleInvoices', 'receiptAccounts', 'patientAccounts']);

        return view('Dashboard.Patients.show', [
            'patient' => $patient,
            'invoices' => $patient->singleInvoices,
            'receiptAccounts' => $patient->receiptAccounts,
            'patientAccounts' => $patient->patientAccounts
        ]);
     }

    public function edit($patient)
    {
        try {
            return view('Dashboard.Patients.edit', compact('patient'));
        } catch (\Exception $e) {
            Log::error('Failed to load edit form for patient: ' . $e->getMessage());
            return back()->with('error', 'Unable to load patient edit form.');
        }
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($data['Phone']);
            // The Astrotomic\Translatable package will handle 'name' and 'Address' translations
            Patient::create($data);
            DB::commit();
            return redirect()->route('patients.index')
                ->with('success', trans('Dashboard/Patient.created_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Patient creation failed: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Patient.create_failed'));
        }
    }

    public function update($request,$patient)
    {
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($data['Phone']);

            // The Translatable package will handle updating translated fields
            $patient->update($data);
            DB::commit();
            return redirect()->route('patients.index')
                ->with('success', trans('Dashboard/Patient.updated_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Patient update failed: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Patient.update_failed'));
        }
    }

    public function destroy($patient)
    {
        DB::beginTransaction();
        try {
            $patient->delete();
            DB::commit();
            return redirect()->route('patients.index')
                ->with('success', trans('Dashboard/Patient.deleted_successfully'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Patient deletion failed: ' . $e->getMessage());
            return back()->with('error', trans('Dashboard/Patient.delete_failed'));
        }
    }
}