@extends('layouts.app')

@section('content')
    <h1>Edit Course</h1>

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="student_id">Student:</label>
            <select name="student_id" id="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $course->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" id="course_name" value="{{ $course->course_name }}" required>
        </div>

        <div>
            <label for="instructor_name">Instructor Name:</label>
            <input type="text" name="instructor_name" id="instructor_name" value="{{ $course->instructor_name }}" required>
        </div>

        <button type="submit">Update Course</button>
    </form>

    <a href="{{ route('courses.index') }}">Back to Course List</a>
@endsection
