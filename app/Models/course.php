<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\course;

class Course extends Model
{
    use HasFactory;

     // This allows these fields to be set using methods like create() or update() directly.
    protected $fillable = ['student_id', 'course_name', 'instructor_name'];

    //Define the relationship between the Course and the Student models.
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    //Define the relationship between the Course and the gardes models.
    public function grades()
{
    return $this->hasMany(Grade::class);
}

}
