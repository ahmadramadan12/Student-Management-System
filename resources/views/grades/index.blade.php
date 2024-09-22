@extends('layouts.app')

@section('content')
    <h1>Grades List</h1>

    @if (session('success'))
        <div>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <ul>
        @foreach ($grades as $grade)
            <li>
                {{ $grade->student->name }} - {{ $grade->course->course_name }}: 
                Partial Grade: {{ $grade->partial_grade }}, Final Grade: {{ $grade->final_grade }}
                <a href="{{ route('grades.edit', $grade->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('grades.create') }}">Add New Grade</a>
@endsection
