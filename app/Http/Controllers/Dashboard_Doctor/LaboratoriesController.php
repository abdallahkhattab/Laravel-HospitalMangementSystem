<?php

namespace App\Http\Controllers\Dashboard_doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\LaboratorieRequest;
use App\interfaces\Doctor_dashboard\LaboratoriesRepositoryInterface;
use App\Models\Laboratorie;
use Illuminate\Http\Request;

class LaboratoriesController extends Controller
{
 
    protected $LaboratorieRepository;

    public function __construct(LaboratoriesRepositoryInterface $LaboratorieRepository)
    {
        $this->LaboratorieRepository = $LaboratorieRepository;
        
    }
  

    
    public function store(LaboratorieRequest $request)
    {
        return $this->LaboratorieRepository->store($request);

    }

   

  
    public function update(LaboratorieRequest $request, string $id)
    {
        return $this->LaboratorieRepository->update($request,$id);
    }

   
    public function destroy(string $id)
    {
        return $this->LaboratorieRepository->destroy($id);
    }
}
