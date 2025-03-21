<?php
namespace App\Repository\Doctor_dashboard;

use App\Models\Laboratorie;
use Flasher\Laravel\Facade\Flasher;
use App\interfaces\Doctor_dashboard\LaboratoriesRepositoryInterface;
use App\Models\Ray;

class LaboratoriesRepository implements LaboratoriesRepositoryInterface
{
   
    public function store($request){
        
        try{

            $data = $request->validated();

            Laboratorie::create($data);
    
            Flasher::addSuccess(__('Dashboard/messages.add_success'));
    
            return redirect()->route('invoices.index');
    

        }catch(\Exception $e){
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    public function update($request,$id)
    {
      
        try{

            $data = $request->validated();
            $this->update($data,$id);
            Flasher::addSuccess(__('Dashboard/messages.add_success'));
    
            return redirect()->route('invoices.index');

        }catch(\Exception $e){
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        
    }

    public function destroy($id)
    {
        try {
            $laboratorie = Laboratorie::findOrFail($id); // Uses BaseRepository method
            $laboratorie->delete($laboratorie); // Uses BaseRepository method

            Flasher::addSuccess(__('Dashboard/messages.delete_success'));
            return redirect()->route('invoices.index');

        } catch (\Exception $e) {
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}