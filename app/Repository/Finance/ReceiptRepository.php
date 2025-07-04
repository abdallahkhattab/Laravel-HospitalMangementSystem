<?php


namespace App\Repository\Finance;

use App\Models\Patient;
use App\Models\FundAccount;
use App\Models\PatientAccount;
use App\Models\ReceiptAccount;
use Illuminate\Support\Facades\DB;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Database\Eloquent\Model;
use App\interfaces\Finance\ReceiptRepositoryInterface;

class ReceiptRepository implements ReceiptRepositoryInterface
{
    public function index()
    {

        $receipts =  ReceiptAccount::all();
        return view('Dashboard.Receipt.index',compact('receipts'));
    }

    public function create()
    {
        $Patients = Patient::all();
        return view('Dashboard.Receipt.add',compact('Patients'));
    }

    public function store($request)
    {

    
        DB::beginTransaction();
      
        try{
            // store receipt_accounts
            $receipt_accounts = new ReceiptAccount();
            $receipt_accounts->date =date('y-m-d');
            $receipt_accounts->patient_id = $request->patient_id;
            $receipt_accounts->amount = $request->Debit;
            $receipt_accounts->description = $request->description;
            $receipt_accounts->save();
            // store fund_accounts
            $fund_accounts = new FundAccount();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->receipt_id = $receipt_accounts->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();
            // store patient_accounts
            $patient_accounts = new PatientAccount();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->receipt_id = $receipt_accounts->id;
            $patient_accounts->Debit = 0.00;
            $patient_accounts->Debit =$request->Debit;
            $patient_accounts->save();
            DB::commit();
            Flasher::addSuccess(__('Dashboard/messages.add_success'));
            return redirect()->route('Receipt.create');
        }

        catch (\Exception $e) {
            DB::rollback();
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }

    }

    public function show($id)
    {
        $receipt = ReceiptAccount::findorfail($id);
        return view('Dashboard.Receipt.print',compact('receipt'));
    }


    public function edit($id)
    {
        $receipt_accounts = ReceiptAccount::findorfail($id);
        $Patients = Patient::all();
        return view('Dashboard.Receipt.edit',compact('receipt_accounts','Patients'));
    }



    public function update($request)
    {
        DB::beginTransaction();

        try{
            // store receipt_accounts
            $receipt_accounts = ReceiptAccount::findorfail($request->id);
            $receipt_accounts->date =date('y-m-d');
            $receipt_accounts->patient_id = $request->patient_id;
            $receipt_accounts->amount = $request->Debit;
            $receipt_accounts->description = $request->description;
            $receipt_accounts->save();
            // store fund_accounts
            $fund_accounts = FundAccount::where('receipt_id',$request->id)->first();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->receipt_id = $receipt_accounts->id;
            $fund_accounts->amount = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();
            // store patient_accounts
            $patient_accounts = PatientAccount::where('receipt_id',$request->id)->first();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->receipt_id = $receipt_accounts->id;
            $patient_accounts->amount = 0.00;
            $patient_accounts->amount =$request->Debit;
            $patient_accounts->save();


            DB::commit();
            Flasher::addSuccess(__('Dashboard/messages.update_success'));

            return redirect()->route('Receipt.index');
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ReceiptAccount ::destroy($request->id);
            Flasher::addSuccess(__('Dashboard/messages.delete_success'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}