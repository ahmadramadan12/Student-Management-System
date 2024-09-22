@extends('layouts.app')

@section('content')
    <h1>{{ $course->course_name }}</h1>
    <p>Instructor: {{ $course->instructor_name }}</p>
    
    <h2>Grades</h2>
    <table>
        <thead>
            <tr>
                <th>Student</th>
                <th>Partial Grade</th>
                <th>Final Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($course->grades as $grade)
                <tr>
                    <td>{{ $grade->student->name }}</td>
                    <td>{{ $grade->partial_grade }}</td>
                    <td>{{ $grade->final_grade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('grades.create', ['course_id' => $course->id]) }}">Add Grade</a>
@endsection
