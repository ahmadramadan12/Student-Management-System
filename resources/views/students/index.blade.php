@extends('layouts.app')

@section('content')
    <h1>Students List</h1>

    @if (session('success'))
        <div>
            <strong>{{ session('success') }}</strong>
            <!-- Display success message if present in session -->
        </div>
    @endif

    <ul>
        @foreach ($students as $student)
            <li>
                {{ $student->name }} - {{ $student->email }} - {{ $student->date_of_birth }}
                <!-- Display student name, email, and date of birth -->
                <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                <!-- Link to edit the student's information -->
            </li>
        @endforeach
    </ul>

    <a href="{{ route('students.create') }}">Add New Student</a>
    <!-- Link to add a new student -->
@endsection
