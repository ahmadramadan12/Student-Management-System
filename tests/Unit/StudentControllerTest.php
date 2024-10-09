<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Student;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase; // This will refresh the database for each test

    protected function setUp(): void
    {
        parent::setUp();
        // Optionally, you can seed the database here if needed
    }

    public function test_can_view_students()
    {
        $student = Student::factory()->create();

        $response = $this->get(route('students.index'));

        $response->assertStatus(200);
        $response->assertViewIs('students.index');
        $response->assertSee($student->name);
    }

    public function test_can_add_student()
    {
        $studentData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'date_of_birth' => '2000-01-01',
        ];

        $response = $this->post(route('students.store'), $studentData);

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', $studentData);
    }

    public function test_can_edit_student()
    {
        $student = Student::factory()->create(['name' => 'Old Name']);

        $updatedData = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'date_of_birth' => '1999-01-01',
        ];

        $response = $this->put(route('students.update', $student->id), $updatedData);

        $response->assertRedirect(route('students.index'));
        $this->assertDatabaseHas('students', $updatedData);
    }
}
