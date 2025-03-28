<?php

namespace App\Repository\Doctor_dashboard;

use App\Models\Ray;
use App\Models\Doctor;
use App\Models\single_invoice;
use Illuminate\Support\Facades\Auth;
use App\interfaces\Doctor_dashboard\InvoicesRepositoryInterface;

class InvoicesRepository implements InvoicesRepositoryInterface
{

     // قائمة الكشوفات تحت الاجراء

    public function index(){

        $invoices =single_invoice::where('doctor_id','=',Auth()->id())->get();

        return view('Dashboard.doctor.invoices.index',compact('invoices'));
    }

    
      // قائمة المراجعات
      public function reviewInvoices()
      {
          $invoices = single_invoice::where('doctor_id','=',Auth::user()->id)->where('invoice_status',2)->get();
          return view('Dashboard.Doctor.invoices.review_invoices', compact('invoices'));
      }
  
      // قائمة الفواتير المكتملة
      public function completedInvoices()
  
      {
          $invoices = single_invoice::where('doctor_id','=',Auth::user()->id)->where('invoice_status',3)->get();
          return view('Dashboard.Doctor.invoices.completed_invoices', compact('invoices'));
      }

      public function show($id)
      {
        $rays = Ray::findOrFail($id);
        if($rays->doctor_id !=Auth()->user()->id){
           // abort(404);
           return redirect()->route('404');
        }
        return view('Dashboard.Doctor.invoices.view_rays', compact('rays'));

        
      }
}