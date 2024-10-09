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
     */
    public function index()
    {
        $grades = Grade::with(['student', 'course'])->get();
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
        $course = Course::with('grades')->findOrFail($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
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
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'partial_grade' => 'required|numeric|min:0|max:100',
            'final_grade' => 'required|numeric|min:0|max:100',
        ]);
    
        $grade = Grade::findOrFail($id);
        $grade->update($request->all());
    
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }
}
