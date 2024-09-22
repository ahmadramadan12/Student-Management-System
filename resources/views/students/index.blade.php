@extends('layouts.app')

@section('content')
    <h1>Students List</h1>

    @if (session('success'))
        <div>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <ul>
        @foreach ($students as $student)
            <li>
                <a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a> - {{ $student->email }}
                <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('students.create') }}">Add New Student</a>
@endsection
