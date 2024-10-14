<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     * This method retrieves and displays all students in the database.
     */
    public function index()
    {
        $students = Student::all(); // Fetch all students from the database
        return view('students.index', compact('students')); // Return the view with the list of students
    }

    /**
     * Show the form for creating a new resource.
     * This method displays the form for adding a new student.
     */
    public function create()
    {
        return view('students.create'); // Return the view to create a new student
    }

    /**
     * Store a newly created resource in storage.
     * This method handles the form submission to save a new student in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
        ]);

        // Create a new student using the validated data
        Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);

        // Redirect to the students index with a success message
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    /**
     * Display the specified resource.
     * This method retrieves and displays the details of a specific student.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id); // Fetch the student by its ID
        return view('students.show', compact('student')); // Return the view with student details
    }

    /**
     * Show the form for editing the specified resource.
     * This method displays the form to edit an existing student's details.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id); // Fetch the student to be edited by its ID
        return view('students.edit', compact('student')); // Return the edit view with student details
    }

    /**
     * Update the specified resource in storage.
     * This method handles the form submission to update a student's details in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data, ensuring the email is unique for all students except the current one
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'date_of_birth' => 'required|date',
        ]);

        // Fetch the student by its ID and update its details
        $student = Student::findOrFail($id);
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
     * This method deletes a specific student from the database.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id); // Fetch the student by its ID
        $student->delete(); // Delete the student from the database

        // Redirect to the students index with a success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
