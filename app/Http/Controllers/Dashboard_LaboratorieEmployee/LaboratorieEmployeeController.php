<?php

namespace App\Http\Controllers\Dashboard_LaboratorieEmployee;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaboratorieEmployeeRequest;
use App\interfaces\LaboratoriesEmployess\LaboratoriesEmployeesRepositoryInterface;
use Illuminate\Http\Request;

class LaboratorieEmployeeController extends Controller
{

    protected $LaboratorieEmployeeService;

    public function __construct(LaboratoriesEmployeesRepositoryInterface $LaboratorieEmployeeService)
    {
        $this->LaboratorieEmployeeService = $LaboratorieEmployeeService;
    }
    
    public function index()
    {
        return $this->LaboratorieEmployeeService->index();
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
    public function store(LaboratorieEmployeeRequest $request)
    {
        return $this->LaboratorieEmployeeService->store($request);
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
    public function update(LaboratorieEmployeeRequest $request, string $id)
    {
        return $this->LaboratorieEmployeeService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->LaboratorieEmployeeService->destroy($id);
    }
}
