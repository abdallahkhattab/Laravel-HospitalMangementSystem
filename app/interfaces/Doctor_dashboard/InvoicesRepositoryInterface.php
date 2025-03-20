<?php

namespace App\interfaces\Doctor_dashboard;

interface InvoicesRepositoryInterface 
{

    public function index();
    
    public function completedInvoices();
   
    public function reviewInvoices();
    
  
}