<?php

namespace App\Http\Controllers\Dashboard\Section;

use App\Http\Controllers\Controller;
use App\interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;
use App\Repository\Sections\SectionRepository;
use Illuminate\Http\Request;

class SectionController extends Controller
{

    protected $sectionRepository;

    public function __construct(SectionRepositoryInterface $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $this->sectionRepository->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string|max:225',
        ]);

         $this->sectionRepository->store($data);

        session()->flash('add');
        return redirect()->route('section.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section,SectionRepositoryInterface $sectionRepository)
    {
       $data = $request->validate([
            'name'=> 'sometimes|string',
        ]);

        $this->sectionRepository->update($section,$data);

        return redirect()->route('section.index')->with('success', 'Section updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section,SectionRepositoryInterface $sectionRepository)
    {
       $this->sectionRepository->destroy($section);
       return redirect()->route('section.index')->with('success', 'Section deleted successfully!');
    }
}
