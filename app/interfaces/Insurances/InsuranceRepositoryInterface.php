<?php
namespace App\interfaces\Insurances;



interface InsuranceRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($insurance);
    public function update($request,$insurance);
    public function destroy($insurance);
    
}