<?php
namespace App\interfaces\Patients;


interface PatientRepositoryInterface
{
    public function index();
    public function create();
    public function show($patient);
    public function store($request);
    public function edit($patient);
    public function update($request ,$patient);
    public function destroy($patient);
    
}