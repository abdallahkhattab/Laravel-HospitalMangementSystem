<?php

namespace App\Repository\Doctor_dashboard;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Diagnostic;
use App\Models\single_invoice;
use Illuminate\Support\Facades\DB;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;
use App\interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;

class DiagnosisRepository implements DiagnosisRepositoryInterface
{
    public function store($request)
    {
        try {
        
            $data = $request->validated();

            $data['date'] = $data['date'] ?? Carbon::now()->toDateString();

            $this->update_invoice_status($data['invoice_id'], 3);

            Diagnostic::create($data);

            Flasher::addSuccess(__('Dashboard/messages.add_success'));

            return redirect()->route('invoices.index');
        } catch (\Exception $e) {
            
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {

        $patient_records = Diagnostic::where('patient_id', $id)->get();

        return view('Dashboard.doctor.invoices.patient_record', compact('patient_records'));
    }

    public function addReview($request)
    {  
        DB::beginTransaction();
        try {
            $data = $request->validated();
            
            $this->update_invoice_status($data['invoice_id'], 2);
            $data['date'] = $data['date'] ?? Carbon::now()->toDateString();
            Diagnostic::create($data);
            DB::commit();
            Flasher::addSuccess(__('Dashboard/messages.add_success'));

            return redirect()->route('invoices.index');

           
        } catch (\Exception $e) {
            DB::rollBack();
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_invoice_status($data, $status_id)
    {
        $invoice = single_invoice::find($data);
        if (!$invoice) {
            throw new \Exception('Invoice not found');
        }

        $invoice->update([
            'invoice_status' => $status_id,
        ]);

        return true;
    }
}
