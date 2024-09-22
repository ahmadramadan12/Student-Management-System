@extends('layouts.app')

@section('content')
    <h1>Edit Grade</h1>

    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $grade->student_id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $grade->course_id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="partial_grade">Partial Grade</label>
            <input type="number" name="partial_grade" id="partial_grade" step="0.01" value="{{ $grade->partial_grade }}" required>
        </div>

        <div>
            <label for="final_grade">Final Grade</label>
            <input type="number" name="final_grade" id="final_grade" step="0.01" value="{{ $grade->final_grade }}" required>
        </div>

        <button type="submit">Update Grade</button>
    </form>
@endsection
