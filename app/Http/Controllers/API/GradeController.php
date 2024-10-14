<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Course;
use App\Models\Student;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     * This method retrieves all grades along with their associated student and course details.
     */
    public function index()
    {
        $grades = Grade::with(['student', 'course'])->get();
        return view('grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     * This method retrieves all courses and students to populate the grade creation form.
     */
    public function create()
    {
        $courses = Course::all();
        $students = Student::all();
        return view('grades.create', compact('courses', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     * This method validates and saves a new grade to the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:students,id',
            'partial_grade' => 'required|numeric|min:0|max:100',
            'final_grade' => 'required|numeric|min:0|max:100',
        ]);

        // Create a new grade using the validated data
        Grade::create($request->all());

        // Redirect to the grades index with a success message
        return redirect()->route('grades.index')->with('success', 'Grade added successfully!');
    }

    /**
     * Display the specified resource.
     * This method retrieves and displays a single course along with its associated grades.
     */
    public function show($id)
    {
        $course = Course::with('grades')->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     * This method retrieves the grade, all students, and courses to populate the edit form.
     */
    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        $students = Student::all();
        $courses = Course::all();
        return view('grades.edit', compact('grade', 'students', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     * This method validates and updates the grade information in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'partial_grade' => 'required|numeric|min:0|max:100',
            'final_grade' => 'required|numeric|min:0|max:100',
        ]);
    
        // Find the grade by its ID and update its details
        $grade = Grade::findOrFail($id);
        $grade->update($request->all());
    
        // Redirect to the grades index with a success message
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }
}
