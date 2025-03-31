<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Database\Seeders\InsuranceCompanySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
/*
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
        ]);*/

       // $this->call(DoctorSeeder::class);
      //  $this->call(AppointmentSeeder::class);

   //  $this->call(InsuranceCompanySeeder::class);

      $this->call(UserSeeder::class);
    }
}
