<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    // Specify the model that the factory is for
    protected $model = Course::class;

    //Define the model's default state.
   
    public function definition()
    {
        return [
            // Create a new Student for this Course instance
            'student_id' => Student::factory(), // Automatically creates a student when creating a course
            'course_name' => $this->faker->word, // Generates a random word for the course name
            'instructor_name' => $this->faker->name, // Generates a random name for the instructor
        ];
    }
}
