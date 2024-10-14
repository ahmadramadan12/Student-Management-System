@extends('layouts.app') <!-- Extend the main layout for consistent styling -->

@section('content') <!-- Define the content section -->
    <h1>Add New Course</h1> <!-- Title for the page -->

    <form action="{{ route('courses.store') }}" method="POST"> <!-- Form to add a new course -->
        @csrf <!-- CSRF token for security -->

        <div>
            <label for="student_id">Student:</label> <!-- Label for the student selection -->
            <select name="student_id" required> <!-- Dropdown for selecting a student -->
                @foreach ($students as $student) <!-- Loop through the students collection -->
                    <option value="{{ $student->id }}">{{ $student->name }}</option> <!-- Option for each student -->
                @endforeach
            </select>
        </div>

        <div>
            <label for="course_name">Course Name:</label> <!-- Label for course name input -->
            <input type="text" name="course_name" required> <!-- Input field for course name -->
        </div>

        <div>
            <label for="instructor_name">Instructor Name:</label> <!-- Label for instructor name input -->
            <input type="text" name="instructor_name" required> <!-- Input field for instructor name -->
        </div>

        <button type="submit">Add Course</button> <!-- Submit button to add the course -->
    </form>

    <a href="{{ route('courses.index') }}">Back to Courses List</a> <!-- Link to go back to the courses list -->
@endsection <!-- End of the content section -->
