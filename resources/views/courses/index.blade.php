@extends('layouts.app')

@section('content')
    <h1>Courses List</h1>

    <!-- Display success message if available -->
    @if (session('success'))
        <div>
            <strong>{{ session('success') }}</strong> <!-- Message shown after a successful action -->
        </div>
    @endif

    <ul>
        @foreach ($courses as $course)
            <li>
                {{ $course->course_name }} - Instructor: {{ $course->instructor_name }} <!-- Display course name and instructor -->
                (Student: {{ $course->student->name }}) <!-- Display the name of the student enrolled in the course -->
                
                <!-- Link to edit the course -->
                <a href="{{ route('courses.edit', $course->id) }}">Edit</a>

                <!-- Form for deleting the course -->
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <!-- Confirmation dialog before deletion -->
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Link to add a new course -->
    <a href="{{ route('courses.create') }}">Add New Course</a>
@endsection
