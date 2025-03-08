<?php

namespace Database\Factories;

use App\Models\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insurance>
 */
class insuranceFactory extends Factory
{
    protected $model = Insurance::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' Insurance',
            'notes' => $this->faker->optional()->sentence,
            'insurance_code' => strtoupper($this->faker->bothify('??####')),
            'discount_percentage' => $this->faker->numberBetween(5, 25) . '%',
            'Company_rate' => $this->faker->numberBetween(70, 90) . '%',
            'status' => $this->faker->boolean,
        ];
    }
}
