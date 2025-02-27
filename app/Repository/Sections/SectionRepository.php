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
       
       Flasher::addSuccess(__('Dashboard/messages.add_success'));
       return redirect()->route('section.index');
        
    }

    public function update(Section $section,array $data){
       return $section->update($data);
       
       Flasher::addSuccess(__('Dashboard/messages.update_success'));
       return redirect()->route('section.index');
    }

    public function destroy(Section $section){
        $section->delete();
        Flasher::addSuccess(__('Dashboard/messages.delete_success'));
       return redirect()->route('section.index');
    }

}