<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <!-- CSRF token for security -->

    <div>
        <label for="name">Name:</label>
        <!-- Input field for student's name -->
        <input type="text" name="name" id="name" required>
    </div>
    
    <div>
        <label for="email">Email:</label>
        <!-- Input field for student's email -->
        <input type="email" name="email" id="email" required>
    </div>
    
    <div>
        <label for="date_of_birth">Date of Birth:</label>
        <!-- Input field for student's date of birth -->
        <input type="date" name="date_of_birth" id="date_of_birth" required>
    </div>
    
    <button type="submit">Add Student</button>
    <!-- Submit button to send the form data -->
</form>
