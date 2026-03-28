<?php

namespace Database\Factories;

use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'nisn' => fake()->unique()->numerify('##########'),
            'class_id' => ClassRoom::inRandomOrder()->first()->id ?? 1
        ];
    }
}
