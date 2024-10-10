<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseControllerTest extends TestCase
{
    use RefreshDatabase;


    protected function setUp(): void
    {
      

        parent::setUp();
        $this->seed(); // This will run the DatabaseSeeder

        // Create a student to associate with courses
        $this->student = Student::factory()->create();
        
        // Create a course for testing
        $this->course = Course::factory()->create([
            'student_id' => $this->student->id,
            'course_name' => 'Test Course',
            'instructor_name' => 'Test Instructor',
        ]);
    }

    /** @test */
    public function it_can_display_courses_index()
    {
        $response = $this->get(route('courses.index'));
        
        $response->assertStatus(200);
        $response->assertViewHas('courses');
        $response->assertSee($this->course->course_name); // Use assertSee instead
    }

    /** @test */
    public function it_can_display_course_create_form()
    {
        $response = $this->get(route('courses.create'));

        $response->assertStatus(200);
        $response->assertViewHas('students');
    }

    /** @test */
    public function it_can_store_a_course()
    {
        $data = [
            'student_id' => $this->student->id,
            'course_name' => 'New Course',
            'instructor_name' => 'New Instructor',
        ];

        $response = $this->post(route('courses.store'), $data);
        
        $response->assertRedirect(route('courses.index'));
        $this->assertDatabaseHas('courses', $data);
    }

    /** @test */
    public function it_can_display_a_single_course()
    {
        $response = $this->get(route('courses.show', $this->course->id));
        
        $response->assertStatus(200);
        $response->assertViewHas('course', $this->course);
    }

    /** @test */
    public function it_can_display_course_edit_form()
    {
        $response = $this->get(route('courses.edit', $this->course->id));

        $response->assertStatus(200);
        $response->assertViewHas('course', $this->course);
        $response->assertViewHas('students');
    }

    /** @test */
    public function it_can_update_a_course()
    {
        $data = [
            'student_id' => $this->student->id,
            'course_name' => 'Updated Course',
            'instructor_name' => 'Updated Instructor',
        ];

        $response = $this->put(route('courses.update', $this->course->id), $data);
        
        $response->assertRedirect(route('courses.index'));
        $this->assertDatabaseHas('courses', $data);
    }

    /** @test */
    public function it_can_delete_a_course()
    {
        $response = $this->delete(route('courses.destroy', $this->course->id));
        
        $response->assertRedirect(route('courses.index'));
        $this->assertDatabaseMissing('courses', ['id' => $this->course->id]); // Use assertDatabaseMissing
    }

    public function it_can_display_courses_by_student()
{
    // Create a student
    $student = Student::factory()->create();

    // Create a course and associate it with the student
    $course = Course::factory()->create([
        'student_id' => $student->id,
    ]);

    // Call the route to display courses by student
    $response = $this->get(route('courses.by_student', $student->id));

    $response->assertStatus(200);
    $response->assertViewHas('courses');
    $response->assertSee($course->course_name);
}

}
