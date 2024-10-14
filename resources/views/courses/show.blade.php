@extends('layouts.app')

@section('content')
    <h1>{{ $course->course_name }}</h1> <!-- Display the course name -->
    <p>Instructor: {{ $course->instructor_name }}</p> <!-- Display the instructor's name -->
    
    <h2>Grades</h2>
    <table>
        <thead>
            <tr>
                <th>Student</th> <!-- Column for student names -->
                <th>Partial Grade</th> <!-- Column for partial grades -->
                <th>Final Grade</th> <!-- Column for final grades -->
            </tr>
        </thead>
        <tbody>
            @foreach ($course->grades as $grade) <!-- Loop through grades associated with the course -->
                <tr>
                    <td>{{ $grade->student->name }}</td> <!-- Display the name of the student -->
                    <td>{{ $grade->partial_grade }}</td> <!-- Display the partial grade -->
                    <td>{{ $grade->final_grade }}</td> <!-- Display the final grade -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Link to add a new grade for this course -->
    <a href="{{ route('grades.create', ['course_id' => $course->id]) }}">Add Grade</a>
@endsection
