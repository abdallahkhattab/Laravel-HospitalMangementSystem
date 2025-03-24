<?php
namespace App\Repository\Ray_Employee_Dashboard\invoices;

use App\interfaces\Ray_Employee_Dashboard\Invoices\InvoicesRepositoryInterface;
use App\Models\Ray;

class InvoiceRepository implements InvoicesRepositoryInterface
{
    public function index(){
        dd(Ray::all());
    }
}