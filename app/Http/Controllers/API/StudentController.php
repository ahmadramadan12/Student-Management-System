<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;



class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all students from the database
        $students = Student::all();
    
        // Return the students index view with the list of students
        return view('students.index', compact('students'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('students.create');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
        ]);
    
        // Create a new student
        Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);
    
        // Redirect to the students index page with a success message
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id); // Find the student by ID
        return view('students.show', compact('student')); // Pass the student data to the view
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);
    
        // Return the edit view and pass the student data
        return view('students.edit', compact('student'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'date_of_birth' => 'required|date',
        ]);
    
        // Find the student by ID
        $student = Student::findOrFail($id);
    
        // Update the student's information
        $student->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);
    
        // Redirect to the students index with a success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id); // Find the student by ID
        $student->delete(); // Delete the student
    
        // Redirect back to the students index with a success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
    
}
