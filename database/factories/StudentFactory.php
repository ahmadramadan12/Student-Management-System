<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    // Specify the model that the factory is for
    protected $model = Student::class;

    //Define the model's default state.
   
    public function definition()
    {
        return [
            // Generate a random name for the student
            'name' => $this->faker->name, // Randomly generated name
            
            // Generate a unique and safe email address for the student
            'email' => $this->faker->unique()->safeEmail, // Unique email address
            
            // Generate a random date for the student's date of birth
            'date_of_birth' => $this->faker->date, // Random date of birth
        ];
    }
}
