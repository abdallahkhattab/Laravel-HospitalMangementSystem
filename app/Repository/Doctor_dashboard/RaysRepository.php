<?php

namespace App\Repository\Doctor_dashboard;

use App\Models\Ray;
use Flasher\Laravel\Facade\Flasher;
use App\interfaces\Doctor_dashboard\RaysRepositoryInterface;
use App\Repository\BaseRepository\BaseRepository;

class RaysRepository implements RaysRepositoryInterface
{


    public function store($request){
        try{

            $data = $request->validated();

            Ray::create($data);
    
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
            $ray = Ray::findOrFail($id);
            $ray->update($data);
            
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
            $ray = Ray::find($id); // Uses BaseRepository method
            $ray->delete(); // Uses BaseRepository method

            Flasher::addSuccess(__('Dashboard/messages.delete_success'));
            return redirect()->route('invoices.index');

        } catch (\Exception $e) {
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



}