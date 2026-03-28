<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\Score;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ClassRoom::factory()->count(5)->create();

        Subject::factory()->count(5)->create();

        Semester::factory()->count(2)->create();

        Student::factory()->count(50)->create();

        Score::factory()->count(200)->create();
    }
}
