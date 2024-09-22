@extends('layouts.app')

@section('content')
    <h1>Add New Course</h1>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div>
            <label for="student_id">Student:</label>
            <select name="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" required>
        </div>

        <div>
            <label for="instructor_name">Instructor Name:</label>
            <input type="text" name="instructor_name" required>
        </div>

        <button type="submit">Add Course</button>
    </form>

    <a href="{{ route('courses.index') }}">Back to Courses List</a>
@endsection
