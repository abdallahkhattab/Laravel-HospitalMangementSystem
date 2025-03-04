<?php
namespace App\Repository\Services;

use App\Models\Service;
use Flasher\Laravel\Facade\Flasher;
use App\Http\Requests\SingleServiceRequest;
use App\interfaces\Services\SingleServiceRepositoryInterface;

class SingleServiceRepository implements SingleServiceRepositoryInterface
{
    public function index(){

        $services = Service::all();
        return view('Dashboard.Services.index',compact('services'));
    }

    public function store($request)
    {
        try{
            $data = $request->validated();
            Service::create($data);
            Flasher::addSuccess(__('Dashboard/messages.add_success'));
            return redirect()->route('services.index'); 
    

        }catch(\Exception $e){
            return redirect()->back()->withErrors('failed');
        }
        
    }

    public function update($request,$service)
    {

        try{
            $data = $request->validated();
            $service->update($data);
            Flasher::addSuccess(__('Dashboard/messages.update_success'));
            return redirect()->route('services.index'); 
    

        }catch(\Exception $e){
            return redirect()->back()->withErrors('failed');
        }

        
    }


    public function destroy($service)
    {
        try{

            $service->delete();
            Flasher::addSuccess(__('Dashboard/messages.delete_success'));
            return redirect()->route('services.index'); 


        }catch(\Exception $e){
            return redirect()->back()->withErrors('failed');
        }
        
    }
}