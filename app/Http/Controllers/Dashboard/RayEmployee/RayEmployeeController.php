<?php

namespace App\Http\Controllers\Dashboard\RayEmployee;

use App\Http\Controllers\Controller;
use App\Http\Requests\RayEmployees;
use App\Interfaces\RayEmployee\RayEmployeesRepositoryInterface;
use Illuminate\Http\Request;

class RayEmployeeController extends Controller
{
    protected $rayEmployeesRepository;

    public function __construct(RayEmployeesRepositoryInterface $rayEmployeesRepository)
    {
        $this->rayEmployeesRepository = $rayEmployeesRepository;
    }

    public function index()
    {
        return $this->rayEmployeesRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RayEmployees $request)
    {
        return $this->rayEmployeesRepository->store($request);
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
    public function update(RayEmployees $request, string $id)
    {
        return $this->rayEmployeesRepository->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->rayEmployeesRepository->destroy($id);
    }
}
