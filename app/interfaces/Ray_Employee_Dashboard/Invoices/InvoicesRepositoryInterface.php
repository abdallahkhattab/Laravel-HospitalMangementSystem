<?php
namespace App\interfaces\Ray_Employee_Dashboard\Invoices;

interface InvoicesRepositoryInterface 
{
    public function index();
    public function edit($id);
    public function update($request,$id);
    public function view_rays($id);
}