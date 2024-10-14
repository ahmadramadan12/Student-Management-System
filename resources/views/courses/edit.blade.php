@extends('layouts.app')

@section('content')
    <h1>Edit Course</h1>

    <!-- Form for editing the course details -->
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="student_id">Student:</label>
            <!-- Dropdown for selecting the student associated with the course -->
            <select name="student_id" id="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $course->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }} <!-- Display the name of the student -->
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="course_name">Course Name:</label>
            <!-- Input field for the course name -->
            <input type="text" name="course_name" id="course_name" value="{{ $course->course_name }}" required>
        </div>

        <div>
            <label for="instructor_name">Instructor Name:</label>
            <!-- Input field for the instructor's name -->
            <input type="text" name="instructor_name" id="instructor_name" value="{{ $course->instructor_name }}" required>
        </div>

        <button type="submit">Update Course</button> <!-- Submit button to update the course -->
    </form>

    <a href="{{ route('courses.index') }}">Back to Course List</a> <!-- Link to go back to the courses list -->
@endsection
