<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Web Development Course', 'Mobile Development Course', 'Computer Science Course', 'Arabic Learning Course'] ),
            'description' => $this->faker->text(),
            'credits' => $this->faker->randomElement([10, 20, 30, 40, 50, 60]),
            'teacher_id' => User::where('role','teacher')->inRandomOrder()->first()->id,
            
        ];
    }
}
