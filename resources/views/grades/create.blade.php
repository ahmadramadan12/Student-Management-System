@extends('layouts.app')

@section('content')
    <h1>Add Grades</h1>

    @if (session('success'))
        <div>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <form action="{{ route('grades.store') }}" method="POST">
        @csrf

        <div>
            <label for="course_id">Course:</label>
            <select name="course_id" id="course_id" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="student_id">Student:</label>
            <select name="student_id" id="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="partial_grade">Partial Grade:</label>
            <input type="number" name="partial_grade" id="partial_grade" step="0.01" min="0" max="100" required>
        </div>

        <div>
            <label for="final_grade">Final Grade:</label>
            <input type="number" name="final_grade" id="final_grade" step="0.01" min="0" max="100" required>
        </div>

        <button type="submit">Add Grade</button>
    </form>
@endsection
