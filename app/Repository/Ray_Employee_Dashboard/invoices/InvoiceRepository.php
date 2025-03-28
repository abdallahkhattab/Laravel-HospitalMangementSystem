<?php
namespace App\Repository\Ray_Employee_Dashboard\invoices;

use App\Models\Ray;
use App\Traits\UploadTrait;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\interfaces\Ray_Employee_Dashboard\Invoices\InvoicesRepositoryInterface;

class InvoiceRepository implements InvoicesRepositoryInterface
{

    use UploadTrait;

    public function index(){
       $invoices = Ray::all();

       return view('Dashboard.Ray_employee_dashboard.invoices.index',compact('invoices'));
    }

    public function edit($id){
        $invoice = Ray::find($id);
        return view('Dashboard.Ray_employee_dashboard.invoices.add_diagnosis',compact('invoice'));

    }

  


    public function update($request, $id)
    {

    
        $invoice = Ray::find($id);
        try {
            $user = Auth::id(); 
            $invoice = Ray::findOrFail($id);
    
            $invoice->update([
                'employee_id' => $user,
                'description_employee' => $request->description_employee,
                'case' => 1,
            ]);
    
            /*
            // Upload image if present
            if ($request->hasFile('photos')) {
                $this->verifyAndStoreImage($request, 'photo', 'doctors', 'public', $user, Ray::class);
            }*/

            if( $request->hasFile( 'photos' ) ) {

                foreach ($request->photos as $photo) {
                    //Upload img
                    $this->verifyAndStoreImageForeach($photo,'Rays','upload_image',$invoice->id,'App\Models\Ray');
                }
       
              }
    
            return redirect()->route('Rayinvoices.index')->with('success', 'Invoice updated successfully.');
    
        } catch (\Exception $e) {
            Log::error("Invoice update failed: " . $e->getMessage()); // Log error for debugging
    
            return redirect()->back()->with('error', 'Failed to update invoice: ' . $e->getMessage());
        }

        
    }

    public function view_rays($id)
    {
        
    }
}
