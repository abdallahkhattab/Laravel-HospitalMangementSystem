<?php

namespace App\Repository\Doctor_dashboard;

use App\Models\Ray;
use Flasher\Laravel\Facade\Flasher;
use App\interfaces\Doctor_dashboard\RaysRepositoryInterface;
use App\Repository\BaseRepository\BaseRepository;

class RaysRepository extends BaseRepository implements RaysRepositoryInterface
{

    public function __construct(Ray $ray)
    {
        parent::__construct($ray);
        
    }
    public function store($request){

        try{

            $data = $request->validated();

            $this->create($data);
    
            Flasher::addSuccess(__('Dashboard/messages.add_success'));
    
            return redirect()->route('invoices.index');
    

        }catch(\Exception $e){
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    public function update($request, $ray)
    {
        try{

            $data = $request->validated();
            $this->update($data,$ray);
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
            $ray = $this->find($id); // Uses BaseRepository method
            $this->delete($ray); // Uses BaseRepository method

            Flasher::addSuccess(__('Dashboard/messages.delete_success'));
            return redirect()->route('invoices.index');

        } catch (\Exception $e) {
            Flasher::addError('Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



}