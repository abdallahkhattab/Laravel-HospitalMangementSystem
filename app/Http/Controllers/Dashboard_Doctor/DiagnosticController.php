<?php

namespace App\Http\Controllers\Dashboard_doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\diagnoiseRequest;
use App\interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    protected $diagnoise;

    public function __construct(DiagnosisRepositoryInterface $diagnoise)
    {
        $this->diagnoise = $diagnoise;
    }


    public function index()
    {
        //
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
    public function store(diagnoiseRequest $request)
    {

       return $this->diagnoise->store($request);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->diagnoise->show($id);
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

    public function addReview(diagnoiseRequest $request){
        return $this->diagnoise->addReview($request);
    }

    public function update_invoice_status($data, $status_id){
        
        return $this->diagnoise->update_invoice_status($data,$status_id);
    }

}
