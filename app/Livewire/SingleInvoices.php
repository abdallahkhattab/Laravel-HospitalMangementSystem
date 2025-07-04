<?php

namespace App\Livewire;

use App\Events\CreateInvoice;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Service;
use Livewire\Component;
use App\Models\FundAccount;
use App\Models\Notification;
use App\Models\PatientAccount;
use App\Models\single_invoice;
use Illuminate\Support\Facades\DB;

class SingleInvoices extends Component
{
    public $InvoiceSaved,$InvoiceUpdated;
    public $show_table = true;
    public $tax_rate = 17;
    public $updateMode = false;
    public $price,$discount_value = 0 ,$patient_id,$doctor_id,$section_id,$type,$Service_id,$single_invoice_id;
    public $username;    

    public function mount()
    {
        $this->username = Auth()->user()->name;
    }
    public function render()
    {
        return view('livewire.single_invoices.single-invoices',[
            'single_invoices'=> single_invoice::all(),
            'Patients'=> Patient::all(),
            'Doctors'=> Doctor::all(),
            'Services'=> Service::all(),
            'subtotal' => $Total_after_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value'=> $Total_after_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100)
        ]);

    }


    public function show_form_add(){
        $this->show_table = false;
    }

    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;

    }

    public function get_price()
    {
        $this->price = Service::where('id', $this->Service_id)->first()->price;
    }


    public function edit($id){

        $this->show_table = false;
        $this->updateMode = true;
        $single_invoice = single_invoice::findorfail($id);
        $this->single_invoice_id = $single_invoice->id;
        $this->patient_id = $single_invoice->patient_id;
        $this->doctor_id = $single_invoice->doctor_id;
        $this->section_id = DB::table('sections_translations')->where('id', $single_invoice->section_id)->first()->name;
        $this->Service_id = $single_invoice->Service_id;
        $this->price = $single_invoice->price;
        $this->discount_value = $single_invoice->discount_value;
        $this->type = $single_invoice->type;


    }



    public function store(){

        // في حالة كانت الفاتورة نقدي
        if($this->type == 1){

            DB::beginTransaction();
            try {

                // في حالة التعديل
                if($this->updateMode){

                    $single_invoices = single_invoice::findorfail($this->single_invoice_id);
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('sections_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    if ($this->discount_value > 0) {
                        // حساب قيمة الضريبة بناءً على السعر بعد الخصم
                        $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    } else {
                        // إذا لم يكن هناك خصم، يتم حساب الضريبة على السعر الأصلي
                        $single_invoices->tax_value = $this->price * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    }                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();

                    $fund_accounts = FundAccount::where('single_invoice_id',$this->single_invoice_id)->first();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->single_invoice_id = $single_invoices->id;
                    $fund_accounts->Debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceUpdated =true;
                    $this->show_table =true;

                    $data = [
                    'patient_id'=>$this->patient_id,
                    'single_invoice_id'=>$this->single_invoice_id,
                    'doctor_id'=>$this->doctor_id,
                    ];

                    $notifications = new Notification();
                    $notifications->user_id = $this->doctor_id;
                    $patient = Patient::find($this->patient_id);
                    $notifications->message = "كشف جديد : ".$patient->name;
                    $notifications->save();

                    event(new CreateInvoice($data));

                }

                // في حالة الاضافة
                else{

                    $single_invoices = new single_invoice();
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('sections_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    if ($this->discount_value > 0) {
                        // حساب قيمة الضريبة بناءً على السعر بعد الخصم
                        $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    } else {
                        // إذا لم يكن هناك خصم، يتم حساب الضريبة على السعر الأصلي
                        $single_invoices->tax_value = $this->price * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    }                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();

                    $fund_accounts = new FundAccount();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->single_invoice_id = $single_invoices->id;
                    $fund_accounts->Debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    $this->InvoiceSaved =true;
                    $this->show_table =true;
                    
                }
               

               

                    $notifications = new Notification();
                    $notifications->user_id = $this->doctor_id;                   
                    $patient = Patient::find($this->patient_id);
                    $notifications->message = "كشف جديد : ".$patient->name;
                    $notifications->save(); 
                    
                    $data = [
                        'patient_id'=>$this->patient_id,
                        'single_invoice_id'=>$this->singleinvoices->id,
                        'doctor_id'=>$this->doctor_id,
    
                        ];
                    event(new CreateInvoice($data));
                    DB::commit();
              }

            catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

        }


        //------------------------------------------------------------------------

        // في حالة كانت الفاتورة اجل
        else{

            DB::beginTransaction();
            try {

                // في حالة التعديل
                if($this->updateMode){

                    $single_invoices = single_invoice::findorfail($this->single_invoice_id);
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('sections_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    if ($this->discount_value > 0) {
                        // حساب قيمة الضريبة بناءً على السعر بعد الخصم
                        $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    } else {
                        // إذا لم يكن هناك خصم، يتم حساب الضريبة على السعر الأصلي
                        $single_invoices->tax_value = $this->price * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    }                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();

                    $patient_accounts = PatientAccount::where('single_invoice_id',$this->single_invoice_id)->first();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->single_invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->Debit = $single_invoices->total_with_tax;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    $this->InvoiceUpdated =true;
                    $this->show_table =true;

                  

                    $data = [
                        'patient_id'=>$this->patient_id,
                        'single_invoice_id'=>$this->single_invoice_id,
                        'doctor_id'=>$this->doctor_id,

                        ];

                        $notifications = new Notification();
                        $notifications->user_id = $this->doctor_id;                        
                        $patient = Patient::find($this->patient_id);
                        $notifications->message = "كشف جديد : ".$patient->name;
                        $notifications->save();

                        event(new CreateInvoice($data));

                }

                // في حالة الاضافة
                else{

                    $single_invoices = new single_invoice();
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = DB::table('sections_translations')->where('name', $this->section_id)->first()->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();

                    $patient_accounts = new PatientAccount();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->single_invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->Debit = $single_invoices->total_with_tax;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    $this->InvoiceSaved =true;
                    $this->show_table =true;
                }

                DB::commit();

                $data = [
                    'patient_id'=>$this->patient_id,
                    'single_invoice_id'=>$this->single_invoice_id,
                    'doctor_id'=>$this->doctor_id,

                    ];

                    $notifications = new Notification();
                    $notifications->user_id = $this->doctor_id;                  
                    $patient = Patient::find($this->patient_id);
                    $notifications->message = "كشف جديد : ".$patient->name;
                    $notifications->save();
                    event(new CreateInvoice($data));
            }

            catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }


        }

    }


    public function delete($id){

     $this->single_invoice_id = $id;

    }

    public function destroy(){
        single_invoice::destroy($this->single_invoice_id);
        return redirect()->route('single_invoices');
    }
}


