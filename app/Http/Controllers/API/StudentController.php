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
  
        $students = Student::all();
    
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
       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
        ]);
    
        Student::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);
    
     
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id); 
        return view('students.show', compact('student')); 
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
        $student = Student::findOrFail($id);
    
        return view('students.edit', compact('student'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
   
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'date_of_birth' => 'required|date',
        ]);
    
   
        $student = Student::findOrFail($id);
    
        $student->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id); 
        $student->delete(); 

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
    
}
