<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    protected $model = Image::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'filename' => $this->faker->imageUrl(640, 480, 'people'), // Fake image URL
            'imageable_id' => null, // Will be set dynamically
            'imageable_type' => null, // Will be set dynamically
        ];
    }

    // State for attaching to a Doctor
    public function forDoctor($doctor)
    {
        return $this->state([
            'imageable_id' => $doctor->id,
            'imageable_type' => \App\Models\Doctor::class,
        ]);
    }
}
