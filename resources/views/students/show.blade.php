@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>

    <p><strong>Name:</strong> {{ $student->name }}</p>
    <!-- Display the student's name -->

    <p><strong>Email:</strong> {{ $student->email }}</p>
    <!-- Display the student's email -->

    <p><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</p>
    <!-- Display the student's date of birth -->

    <a href="{{ route('students.index') }}">Back to List</a>
    <!-- Link to navigate back to the students list -->
@endsection
