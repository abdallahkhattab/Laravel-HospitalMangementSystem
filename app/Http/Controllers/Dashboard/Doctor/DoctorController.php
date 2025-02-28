<?php

namespace App\Http\Controllers\Dashboard\Doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\interfaces\Doctors\DoctorRepositoryInterface;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $doctorRepositroy;

    public function __construct(DoctorRepositoryInterface $doctorRepositroy)
    {
        $this->doctorRepositroy = $doctorRepositroy;
        
    }


    public function index()
    {
    
         $this->doctorRepositroy->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Doctor $doctor)
    {
        return view('Dashboard.Doctors.add',compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        $data = $request->validated();

         $this->doctorRepositroy->store($data);
        Flasher::addSuccess(__('Dashboard/messages.add_success'));
        return redirect()->route('doctors.index'); 
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
        return view('Dashboard.Doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
