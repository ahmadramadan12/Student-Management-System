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
                {{ $student->name }} - {{ $student->email }} - {{ $student->date_of_birth }}
                <a href="{{ route('students.edit', $student->id) }}">Edit</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('students.create') }}">Add New Student</a>
@endsection
