<?php

namespace App\interfaces\Doctor_dashboard;

interface DiagnosisRepositoryInterface 
{

   public function store($request);
   public function show($id);
   public function addReview($request);
   public function update_invoice_status($data, $status_id);
}