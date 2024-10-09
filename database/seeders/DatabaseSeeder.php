<?php
// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Student;
use App\Models\Grade;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create some students
        $students = Student::factory()->count(5)->create();

        // Create some courses
        $courses = Course::factory()->count(3)->create();

        // Create grades for the students in the courses
        foreach ($students as $student) {
            foreach ($courses as $course) {
                Grade::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'partial_grade' => rand(0, 100),
                    'final_grade' => rand(0, 100),
                ]);
            }
        }
    }
}
