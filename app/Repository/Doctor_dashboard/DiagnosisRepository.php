<?php

namespace App\Repository\Doctor_dashboard;

use App\Models\Doctor;
use App\Models\Diagnostic;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;
use App\interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;
use App\Models\Patient;
use App\Models\single_invoice;
use Carbon\Carbon;

class DiagnosisRepository implements DiagnosisRepositoryInterface
{
    public function store($request)
    {
        try {
            // ✅ جلب البيانات بعد التحقق منها
            $data = $request->validated();
    
            // ✅ تعيين التاريخ الافتراضي إذا لم يكن موجودًا
            $data['date'] = $data['date'] ?? Carbon::now()->toDateString();
    
            // ✅ جلب الفاتورة المطلوبة
            $invoice = single_invoice::find($data['invoice_id']);
            if (!$invoice) {
                throw new \Exception('Invoice not found');
            }
    
            // ✅ تحديث حالة الفاتورة
            $invoice->update([
                'invoice_status' => 3,
            ]);
    
            // ✅ إنشاء التشخيص
            Diagnostic::create($data);
    
            // ✅ إشعار النجاح
            Flasher::addSuccess(__('Dashboard/messages.add_success'));
    
            return redirect()->route('invoices.index');
    
        } catch (\Exception $e) {
            // ✅ إشعار الخطأ
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    

    public function show($id){

        $patient_records = Diagnostic::where('patient_id',$id)->get();
     
        return view('Dashboard.doctor.invoices.patient_record',compact('patient_records'));
    }

    public function addReview($request)
{
    try {
        $data = $request->validated();
        $data['date'] = $data['date'] ?? Carbon::now()->toDateString();
        $diagnoises = Diagnostic::create($data);
        
        return redirect()->back()->with('success', __('Dashboard/messages.add_success'));
    } catch (\Exception $e) {
        
        return redirect()->back()->with('error',': ' . $e->getMessage());
    }
}

}