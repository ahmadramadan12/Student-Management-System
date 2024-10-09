<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Course;

class GradeControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $student;
    protected $course;
    protected $grade;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a student
        $this->student = Student::factory()->create();

        // Create a course
        $this->course = Course::factory()->create();

        // Create a grade
        $this->grade = Grade::factory()->create([
            'student_id' => $this->student->id,
            'course_id' => $this->course->id,
            'partial_grade' => 80,
            'final_grade' => 90,
        ]);
    }

    public function test_can_view_grades()
    {
        $response = $this->get(route('grades.index'));

        $response->assertStatus(200);
        $response->assertViewIs('grades.index');
        $response->assertSee($this->grade->partial_grade);
    }

    public function test_can_edit_grade()
    {
        $updatedData = [
            'student_id' => $this->student->id,
            'course_id' => $this->course->id,
            'partial_grade' => 85,
            'final_grade' => 90,
        ];

        $response = $this->put(route('grades.update', $this->grade->id), $updatedData);

        $response->assertRedirect(route('grades.index'));
        $this->assertDatabaseHas('grades', $updatedData);
    }
}
