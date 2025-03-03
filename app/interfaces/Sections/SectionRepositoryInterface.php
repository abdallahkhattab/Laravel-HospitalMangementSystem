<?php

namespace App\interfaces\Sections;

use App\Models\Section;

interface SectionRepositoryInterface
{

    // get all Sections
    public function index();

    // store index
    public function store(array $data):Section;

    public function update(Section $section,array $data);

    public function destroy(Section $section);

    public function getAllSections();
}