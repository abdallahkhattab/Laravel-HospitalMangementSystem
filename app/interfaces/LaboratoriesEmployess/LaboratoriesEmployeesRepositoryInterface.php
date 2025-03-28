<?php
namespace App\interfaces\LaboratoriesEmployess;

interface LaboratoriesEmployeesRepositoryInterface
{
    public function index();

    public function store($request);

    public function update($request,$id);

    public function destroy($id);
}