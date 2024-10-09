<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'student_id' => Student::factory(), // Creates a student for the course
            'course_name' => $this->faker->word,
            'instructor_name' => $this->faker->name,
        ];
    }
}
