<?php
namespace App\Repository\Sections;
use App\interfaces\Sections\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{

    public function index(){
        return "test";
    }

}