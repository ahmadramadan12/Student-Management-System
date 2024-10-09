@extends('layouts.app')

@section('content')
    <h1>Courses List</h1>

    @if (session('success'))
        <div>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <ul>
        @foreach ($courses as $course)
            <li>
                {{ $course->course_name }} - Instructor: {{ $course->instructor_name }}
                (Student: {{ $course->student->name }})
                <a href="{{ route('courses.edit', $course->id) }}">Edit</a>
                
        
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('courses.create') }}">Add New Course</a>
@endsection
