<?php
namespace App\Repository\Sections;
use App\Models\Section;
use Flasher\Laravel\Facade\Flasher;
use App\interfaces\Sections\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{

    public function index(){
       
        $sections = Section::all();
        return view('Dashboard.Sections.index',compact('sections'));
    }

    

    public function store(array $data):Section
    {
        
       return Section::create($data);
       
    }

    public function update(Section $section,array $data){
       return $section->update($data);
       
      
    }

    public function destroy(Section $section){
       return $section->delete();
    }

    public function getAllSections(){
        return Section::all();
    }

}