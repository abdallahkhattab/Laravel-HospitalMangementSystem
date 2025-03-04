<?php

namespace App\Http\Controllers\Dashboard\Service;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SingleServiceRequest;
use App\interfaces\Services\SingleServiceRepositoryInterface;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $SingleService;

    public function __construct(SingleServiceRepositoryInterface $SingleService)
    {
        $this->SingleService = $SingleService;
        
    }
    public function index()
    {
        //
       return  $this->SingleService->index();

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
    public function store(SingleServiceRequest $request)
    {
        //
        return $this->SingleService->store($request);
    
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
    public function edit(Service $service)
    {
        return view('Dashboard.Services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SingleServiceRequest $request, Service $service)
    {
       return $this->SingleService->update($request,$service);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
        return $this->SingleService->destroy($service);

    }
}
