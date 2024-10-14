<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    // Specify the model that the factory is for
    protected $model = Grade::class;

    //Define the model's default state.
    
    public function definition()
    {
        return [
            // Automatically create a Course for this Grade instance
            'course_id' => Course::factory(), // Generates a new course for this grade
            // Automatically create a Student for this Grade instance
            'student_id' => Student::factory(), // Generates a new student for this grade
            // Generate a random number between 0 and 100 for partial_grade
            'partial_grade' => $this->faker->numberBetween(0, 100), // Random partial grade
            // Generate a random number between 0 and 100 for final_grade
            'final_grade' => $this->faker->numberBetween(0, 100), // Random final grade
        ];
    }
}
