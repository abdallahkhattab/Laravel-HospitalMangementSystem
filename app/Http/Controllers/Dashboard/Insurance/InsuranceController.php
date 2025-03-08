<?php

namespace App\Http\Controllers\Dashboard\Insurance;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceRequest;
use App\Http\Requests\UpdateInsuranceRequest;
use App\interfaces\Insurances\InsuranceRepositoryInterface;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{

    protected $insuranceRepository;

    public function __construct(InsuranceRepositoryInterface $insuranceRepository)
    {

        $this->insuranceRepository = $insuranceRepository;
        
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       return $this->insuranceRepository->index();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->insuranceRepository->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InsuranceRequest $request)
    {
        //

        return $this->insuranceRepository->store($request);

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
    public function edit(Insurance $insurance)
    {
        //
       return $this->insuranceRepository->edit($insurance);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInsuranceRequest $request, Insurance $insurance)
    {
        return $this->insuranceRepository->update($request,$insurance);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insurance $insurance)
    {
        return $this->insuranceRepository->destroy($insurance);
    }
}
