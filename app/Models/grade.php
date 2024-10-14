<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grade;

class Grade extends Model
{
    use HasFactory;

    // This allows these fields to be set using methods like create() or update() directly.
    protected $fillable = ['course_id', 'student_id', 'partial_grade', 'final_grade'];

    //Define the relationship between the Grade and the Course models.
  
    public function course()
    {
        return $this->belongsTo(Course::class); // A grade is associated with one course
    }

    
    //Define the relationship between the Grade and the Student models.
    
    public function student()
    {
        return $this->belongsTo(Student::class); // A grade is associated with one student
    }
}
