<?php

namespace Database\Factories;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Doctor::class;

    public function definition(): array
    {
        $password = Hash::make('password');
        return [
            'email'=>$this->faker->unique()->safeEmail(),
            'email_verified_at'=> now(),
            'name'=> 'Dr. ' . $this->faker->name,
            'phone'=>$this->faker->phoneNumber,
            'password'=>$password,
            'price'=>$this->faker->randomElement([100,200,300,400,500]),
            'appointments'=>$this->faker->randomElement(['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday']),
            'section_id' => Section::factory(), // Creates or references a section
        ];
    }
}
