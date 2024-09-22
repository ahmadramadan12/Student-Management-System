<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\grade;
use App\Models\course;
use App\Models\student;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all grades with related students and courses
        $grades = Grade::with(['student', 'course'])->get();

        // Return the view with grades data
        return view('grades.index', compact('grades'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $students = Student::all();
        return view('grades.create', compact('courses', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
            'partial_grade' => 'required|numeric|min:0|max:100',
            'final_grade' => 'required|numeric|min:0|max:100',
        ]);

        Grade::create($request->all());

        return redirect()->route('grades.index')->with('success', 'Grade added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::with('grades')->findOrFail($id); // Fetch the course with its grades
        return view('courses.show', compact('course')); // Pass the course to the view
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $grade = Grade::findOrFail($id); // Find the grade by ID
        $students = Student::all(); // Get all students
        $courses = Course::all(); // Get all courses
        return view('grades.edit', compact('grade', 'students', 'courses')); // Pass them to the view
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'partial_grade' => 'required|numeric',
            'final_grade' => 'required|numeric',
        ]);
    
        $grade = Grade::findOrFail($id);
        $grade->update($request->all());
    
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
