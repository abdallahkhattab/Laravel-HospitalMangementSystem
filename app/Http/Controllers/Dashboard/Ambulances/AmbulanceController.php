<?php

namespace App\Http\Controllers\Dashboard\Ambulances;

use App\Http\Controllers\Controller;
use App\Http\Requests\AmbulanceRequest;
use App\interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $ambulanceRepository;

    public function __construct(AmbulanceRepositoryInterface $ambulanceRepository)
    {

        $this->ambulanceRepository = $ambulanceRepository;
        
    }
    public function index()
    {

        return $this->ambulanceRepository->index();
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->ambulanceRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmbulanceRequest $request)
    {

        return $this->ambulanceRepository->store($request);
        
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
    public function edit(Ambulance $ambulance)
    {
        return $this->ambulanceRepository->edit($ambulance);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmbulanceRequest $request,Ambulance $ambulance)
    {
        return $this->ambulanceRepository->update($request,$ambulance);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ambulance $ambulance)
    {
        return $this->ambulanceRepository->destroy($ambulance);
    }
}
