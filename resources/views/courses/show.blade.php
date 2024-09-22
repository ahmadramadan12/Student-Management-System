@extends('layouts.app')

@section('content')
    <h1>{{ $course->course_name }}</h1>

    <p><strong>Instructor:</strong> {{ $course->instructor_name }}</p>
    <p><strong>Student:</strong> {{ $course->student->name }}</p>
    <p><strong>Created At:</strong> {{ $course->created_at }}</p>
    <p><strong>Updated At:</strong> {{ $course->updated_at }}</p>

    <a href="{{ route('courses.index') }}">Back to Course List</a>
@endsection
