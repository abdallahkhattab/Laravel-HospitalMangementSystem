<?php

namespace App\Interfaces\Lab;


interface RayEmployeesRepositoryInterface 
{
    public function index();
    public function store($request);
    public function update($request,$id);
    public function destroy($id);
}