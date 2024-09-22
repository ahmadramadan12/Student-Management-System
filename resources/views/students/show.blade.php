@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>

    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</p>

    <a href="{{ route('students.index') }}">Back to List</a>
@endsection
