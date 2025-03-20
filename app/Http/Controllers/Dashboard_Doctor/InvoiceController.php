<?php

namespace App\Http\Controllers\Dashboard_Doctor;

use App\Http\Controllers\Controller;
use App\interfaces\Doctor_dashboard\InvoicesRepositoryInterface;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    protected $invoiceRepository;

    public function __construct(InvoicesRepositoryInterface $invoiceRepository)
    {

        $this->invoiceRepository = $invoiceRepository;
        
    }
    public function index()
    {
        return $this->invoiceRepository->index();
    }

    public function completedInvoices()
    {
        return $this->invoiceRepository->completedInvoices();
    }

    public function reviewInvoices()
    {
        return $this->invoiceRepository->reviewInvoices();
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
        //
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
