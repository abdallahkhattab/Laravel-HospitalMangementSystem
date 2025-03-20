<?php

namespace App\Http\Controllers\Dashboard_Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\RaysRequest;
use App\interfaces\Doctor_dashboard\RaysRepositoryInterface;
use App\Models\Ray;
use Illuminate\Http\Request;

class RaysController extends Controller
{
    protected $RaysRepository;

    public function __construct(RaysRepositoryInterface $RaysRepository)
    {
        $this->RaysRepository = $RaysRepository;
        
    }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RaysRequest $request)
    {
        return $this->RaysRepository->store($request);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RaysRequest $request, Ray $ray)
    {
       return $this->RaysRepository->update($request,$ray); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->RaysRepository->destroy($id);
    }
}
