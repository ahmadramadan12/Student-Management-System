@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $student->name }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ $student->email }}" required>
        </div>

        <div>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}" required>
        </div>

        <button type="submit">Update Student</button>
    </form>

    <a href="{{ route('students.index') }}">Back to List</a>
@endsection