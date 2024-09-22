@extends('layouts.app')

@section('content')
    <h1>Courses for {{ $student->name }}</h1>

    @if ($courses->isEmpty())
        <p>No courses found for this student.</p>
    @else
        <ul>
            @foreach ($courses as $course)
                <li>
                    <a href="{{ route('courses.show', $course->id) }}">{{ $course->course_name }}</a> - Instructor: {{ $course->instructor_name }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('courses.create') }}">Add New Course</a>
@endsection
