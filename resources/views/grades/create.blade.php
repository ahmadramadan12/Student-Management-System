@extends('layouts.app')

@section('content')
    <h1>Add Grades</h1>

    <!-- Display success message if there is one in the session -->
    @if (session('success'))
        <div>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <!-- Form to add a new grade -->
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf <!-- CSRF token for security -->

        <div>
            <label for="course_id">Course:</label>
            <!-- Dropdown to select a course -->
            <select name="course_id" id="course_id" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="student_id">Student:</label>
            <!-- Dropdown to select a student -->
            <select name="student_id" id="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="partial_grade">Partial Grade:</label>
            <!-- Input for entering partial grade -->
            <input type="number" name="partial_grade" id="partial_grade" step="0.01" min="0" max="100" required>
        </div>

        <div>
            <label for="final_grade">Final Grade:</label>
            <!-- Input for entering final grade -->
            <input type="number" name="final_grade" id="final_grade" step="0.01" min="0" max="100" required>
        </div>

        <!-- Button to submit the form -->
        <button type="submit">Add Grade</button>
    </form>
@endsection
