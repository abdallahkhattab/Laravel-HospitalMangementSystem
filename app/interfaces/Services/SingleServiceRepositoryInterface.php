<?php
namespace App\interfaces\Services;

use App\Models\Service;

interface SingleServiceRepositoryInterface 
{
    public function index();
    public function store($request);
    public function update($request,$service);
    public function destroy($service);
    
}