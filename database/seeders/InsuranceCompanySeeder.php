<?php

namespace Database\Seeders;

use App\Models\Insurance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     protected $model = Insurance::class;

    public function run(): void
    {
        Insurance::factory()->count(5)->create();
      
    }
}
