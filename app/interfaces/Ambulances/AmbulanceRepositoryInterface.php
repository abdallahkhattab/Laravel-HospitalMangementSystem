<?php
namespace App\interfaces\Ambulances;


interface AmbulanceRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($ambulance);
    public function update($request ,$ambulance);
    public function destroy($ambulance);
    
}