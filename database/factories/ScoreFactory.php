<?php

namespace Database\Factories;

use App\Models\Score;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->id ?? 1,
            'subject_id' => Subject::inRandomOrder()->first()->id ?? 1,
            'semester_id' => Semester::inRandomOrder()->first()->id ?? 1,
            'score' => fake()->numberBetween(60, 100),
        ];
    }
}
