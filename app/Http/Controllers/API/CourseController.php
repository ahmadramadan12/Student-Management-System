<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * This method retrieves all courses along with their associated student details.
     */
    public function index()
    {
        $courses = Course::with('student')->get(); 
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     * This method retrieves all students to populate a dropdown in the course creation form.
     */
    public function create()
    {
        $students = Student::all();
        return view('courses.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     * This method validates and saves a new course to the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_name' => 'required|string',
            'instructor_name' => 'required|string',
        ]);

        // Create a new course using the validated data
        Course::create($request->all());

        // Redirect to the courses index with a success message
        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     * This method retrieves and displays a single course along with its student details.
     */
    public function show($id)
    {
        $course = Course::with('student')->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     * This method retrieves the course and all students to populate the edit form.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $students = Student::all();
        return view('courses.edit', compact('course', 'students'));
    }

    /**
     * Update the specified resource in storage.
     * This method validates and updates the course information in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_name' => 'required|string',
            'instructor_name' => 'required|string',
        ]);
    
        // Find the course by its ID and update its details
        $course = Course::findOrFail($id);
        $course->update($request->all());
    
        // Redirect to the courses index with a success message
        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * This method deletes the specified course from the database.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        // Redirect to the courses index with a success message
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }

    /**
     * Display the courses for a specific student.
     * This method retrieves all courses associated with a specific student.
     */
    public function coursesByStudent($studentId)
    {
        $student = Student::findOrFail($studentId);
        $courses = $student->courses; 
        return view('courses.by_student', compact('student', 'courses'));
    }
}
