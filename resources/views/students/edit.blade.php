@extends('layouts.app')

@section('content')
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- CSRF token for security and method spoofing to indicate an update -->

        <div>
            <label for="name">Name:</label>
            <!-- Input field for student's name, pre-filled with current value -->
            <input type="text" name="name" value="{{ $student->name }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <!-- Input field for student's email, pre-filled with current value -->
            <input type="email" name="email" value="{{ $student->email }}" required>
        </div>

        <div>
            <label for="date_of_birth">Date of Birth:</label>
            <!-- Input field for student's date of birth, pre-filled with current value -->
            <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}" required>
        </div>

        <button type="submit">Update Student</button>
        <!-- Submit button to send updated data -->
    </form>

    <a href="{{ route('students.index') }}">Back to List</a>
    <!-- Link to navigate back to the student list -->
@endsection
