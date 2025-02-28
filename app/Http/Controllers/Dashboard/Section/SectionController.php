<?php

namespace App\Http\Controllers\Dashboard\Section;

use App\Models\Section;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Repository\Sections\SectionRepository;
use App\interfaces\Sections\SectionRepositoryInterface;

class SectionController extends Controller
{

    protected $sectionRepository;

    public function __construct(SectionRepositoryInterface $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }
 
    public function index()
    {
        return $this->sectionRepository->index();
    }

  
    public function store(SectionRequest $request)
    {
        //
        $data = $request->validated();

        $this->sectionRepository->store($data);
        Flasher::addSuccess(__('Dashboard/messages.add_success'));
        return redirect()->route('section.index'); 

    }

  
    public function update(SectionRequest $request, Section $section)
    {
        $data = $request->validated();

        $this->sectionRepository->update($section, $data);

        Flasher::addSuccess(__('Dashboard/messages.update_success'));
        return redirect()->route('section.index'); 


    }

    public function destroy(Section $section)
    {
        $this->sectionRepository->destroy($section);

        Flasher::addSuccess(__('Dashboard/messages.delete_success'));
        return redirect()->route('section.index'); 


    }
}
