<?php


namespace App\Repository\Finance;

use App\Models\Patient;
use App\Models\FundAccount;
use App\Models\PatientAccount;
use App\Models\PaymentAccount;
use App\Models\ReceiptAccount;
use Illuminate\Support\Facades\DB;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Database\Eloquent\Model;
use App\interfaces\Finance\PaymentRepositoryInterface;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function index()
    {
        $payments =  PaymentAccount::all();
        return view('Dashboard.Payment.index',compact('payments'));
    }

    public function create()
    {
        $Patients = Patient::all();
        return view('Dashboard.Payment.add',compact('Patients'));
    }

    public function show($id)
    {
        $payment_account = PaymentAccount::findorfail($id);
      
        return view('Dashboard.Payment.print',compact('payment_account'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {

            // store receipt_accounts
            $payment_accounts = new PaymentAccount();
            $payment_accounts->date =date('y-m-d');
            $payment_accounts->patient_id = $request->patient_id;
            $payment_accounts->amount = $request->credit;
            $payment_accounts->description = $request->description;
            $payment_accounts->save();

            // store fund_accounts
            $fund_accounts = new FundAccount();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->payment_id = $payment_accounts->id;
            $fund_accounts->credit = $request->credit;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->save();

            // store patient_accounts
            $patient_accounts = new PatientAccount();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->payment_id = $payment_accounts->id;
            $patient_accounts->Debit = $request->credit;
            $patient_accounts->credit = 0.00;
            $patient_accounts->save();

            DB::commit();
            Flasher::addSuccess(__('Dashboard/messages.add_success'));
            return redirect()->route('Payment.create');

        }
        catch (\Exception $e) {
            DB::rollback();
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $payment_accounts = PaymentAccount::findorfail($id);
        $Patients = Patient::all();
        return view('Dashboard.Payment.edit',compact('payment_accounts','Patients'));
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {

            // update receipt_accounts
            $payment_accounts = PaymentAccount::findorfail($request->id);
            $payment_accounts->date =date('y-m-d');
            $payment_accounts->patient_id = $request->patient_id;
            $payment_accounts->amount = $request->credit;
            $payment_accounts->description = $request->description;
            $payment_accounts->save();

            // update fund_accounts
            $fund_accounts = FundAccount::where('payment_id',$payment_accounts->id)->first();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->payment_id = $payment_accounts->id;
            $fund_accounts->credit = $request->credit;
            $fund_accounts->Debit = 0.00;
            $fund_accounts->save();

            // update patient_accounts
            $patient_accounts = PatientAccount::where('payment_id',$payment_accounts->id)->first();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->payment_id = $payment_accounts->id;
            $patient_accounts->Debit = $request->credit;
            $patient_accounts->credit = 0.00;
            $patient_accounts->save();

            DB::commit();
            Flasher::addSuccess(__('Dashboard/messages.add_success'));
            return redirect()->route('Payment.create');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            PaymentAccount::destroy($request->id);
            Flasher::addSuccess(__('Dashboard/messages.delete_success'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}