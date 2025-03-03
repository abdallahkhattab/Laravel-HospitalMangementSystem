<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointmes = ['sunday','monday','tuesday','wednesday','thursday','friday'];
        foreach ($appointmes as $appointment) {
            Appointment::create([
                'name' => $appointment,
            ]);
    }}
}
