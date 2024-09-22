<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\course;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'course_name', 'instructor_name'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
