@extends('layouts.app') <!-- Extend the main layout for consistent styling -->

@section('content') <!-- Define the content section -->
    <h1>Courses for {{ $student->name }}</h1> <!-- Display the student's name -->

    @if ($courses->isEmpty()) <!-- Check if the courses collection is empty -->
        <p>No courses found for this student.</p> <!-- Message if no courses exist -->
    @else
        <ul> <!-- Start an unordered list for displaying courses -->
            @foreach ($courses as $course) <!-- Loop through each course -->
                <li>
                    <a href="{{ route('courses.show', $course->id) }}">{{ $course->course_name }}</a> <!-- Link to course details -->
                    - Instructor: {{ $course->instructor_name }} <!-- Display instructor name -->
                </li>
            @endforeach
        </ul> <!-- End of the unordered list -->
    @endif

    <a href="{{ route('courses.create') }}">Add New Course</a> <!-- Link to create a new course -->
@endsection <!-- End of the content section -->
