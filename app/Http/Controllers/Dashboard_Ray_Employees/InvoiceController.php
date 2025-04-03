<?php

namespace App\Http\Controllers\Dashboard_Ray_Employees;

use App\Http\Controllers\Controller;
use App\interfaces\Ray_Employee_Dashboard\Invoices\InvoicesRepositoryInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    
    
    protected $InvoiceRepository;

    public function __construct(InvoicesRepositoryInterface $InvoiceRepository)
    {
        $this->InvoiceRepository = $InvoiceRepository;
    }

    
    public function index()
    {
       return $this->InvoiceRepository->index();
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
    public function store(Request $request)
    {
        //
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
        return $this->InvoiceRepository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->InvoiceRepository->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
