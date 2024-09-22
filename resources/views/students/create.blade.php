<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
    </div>
    
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    
    <div>
        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" id="date_of_birth" required>
    </div>
    
    <button type="submit">Add Student</button>
</form>
