<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    protected $model = Grade::class;

    public function definition()
    {
        return [
            'course_id' => Course::factory(), // Automatically create a Course
            'student_id' => Student::factory(), // Automatically create a Student
            'partial_grade' => $this->faker->numberBetween(0, 100),
            'final_grade' => $this->faker->numberBetween(0, 100),
        ];
    }
}
