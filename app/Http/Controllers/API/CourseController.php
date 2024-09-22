<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\course;
use App\Models\student;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $courses = Course::with('student')->get(); // Eager load students for each course
    return view('courses.index', compact('courses'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all(); // Fetch all students to populate the dropdown
        return view('courses.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_name' => 'required|string',
            'instructor_name' => 'required|string',
        ]);

        // Create the course using the validated data
        Course::create($request->all());

        // Redirect back to the courses list with a success message
        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     */
  
public function show($id)
{
    $course = Course::with('student')->findOrFail($id);
    return view('courses.show', compact('course'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $students = Student::all();
        return view('courses.edit', compact('course', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_name' => 'required|string',
            'instructor_name' => 'required|string',
        ]);
    
        $course = Course::findOrFail($id);
        $course->update($request->all());
    
        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $course = Course::findOrFail($id);
    $course->delete();

    return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
}

public function coursesByStudent($studentId)
{
    $student = Student::findOrFail($studentId);
    $courses = $student->courses; // Assuming the Student model has a 'courses' relationship
    return view('courses.by_student', compact('student', 'courses'));
}

}
