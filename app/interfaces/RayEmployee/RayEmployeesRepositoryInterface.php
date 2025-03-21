<?php

namespace App\Interfaces\RayEmployee;

interface RayEmployeesRepositoryInterface
{
    public function index();

    public function store($request);

    public function update($request,$id);

    public function destroy($id);

}