@extends('layouts.app')

@section('content')
    <h1>Grades List</h1>

    <!-- Check if there's a success message in the session and display it -->
    @if (session('success'))
        <div>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <ul>
        @foreach ($grades as $grade)
            <li>
                <!-- Displaying the student's name, course name, partial grade, and final grade -->
                {{ $grade->student->name }} - {{ $grade->course->course_name }}: 
                Partial Grade: {{ $grade->partial_grade }}, Final Grade: {{ $grade->final_grade }}
                <!-- Link to edit the specific grade -->
                <a href="{{ route('grades.edit', $grade->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>

    <!-- Link to add a new grade -->
    <a href="{{ route('grades.create') }}">Add New Grade</a>
@endsection
