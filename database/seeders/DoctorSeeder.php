<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create 10 fake doctors
        Doctor::factory()->count(10)->create()->each(function ($doctor) {
            Image::factory()->forDoctor($doctor)->create();
        });  
    }
}
