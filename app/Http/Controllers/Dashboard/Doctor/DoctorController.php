<?php

namespace App\Http\Controllers\Dashboard\Doctor;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Hash;
use App\interfaces\Doctors\DoctorRepositoryInterface;
use App\Traits\UploadTrait;

class DoctorController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */

    protected $doctorRepository;

    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
        
    }


    public function index()
    {

      $doctors = $this->doctorRepository->index();
      return view('dashboard.doctors.index', compact('doctors'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $sections = $this->doctorRepository->create();
       return view('Dashboard.Doctors.add', compact('sections'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        try {
            $doctor = $this->doctorRepository->store($request);
            Flasher::addSuccess(__('dashboard/messages.add_success'));
            return redirect()->route('doctors.index');
        } catch (\Exception $e) {
            Flasher::addError($e->getMessage());
            return redirect()->back()->withInput();
        }
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
        $sections =$this->doctorRepository->edit();
        return view('Dashboard.Doctors.edit',compact('doctor','sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request,Doctor $doctor)
    {
        //
        $this->doctorRepository->update($request,$doctor);
        Flasher::addSuccess(__('dashboard/messages.add_success'));
        return redirect()->route('doctors.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
       $doctor = $this->doctorRepository->destroy($doctor);
       Flasher::addSuccess(__('Dashboard/messages.delete_success'));
       return redirect()->route('doctors.index');
    }
}
