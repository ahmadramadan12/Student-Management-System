<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Student extends Model
{
    use HasFactory;

    // This allows these fields to be set using methods like create() or update() directly.
    protected $fillable = ['name', 'email', 'date_of_birth'];

    
    //Define the relationship between the Student and Course models.

    public function courses()
    {
        return $this->belongsToMany(Course::class); // A student can be enrolled in multiple courses
    }

    //Define the relationship between the Student and Grade models.
    
    public function grades()
    {
        return $this->hasMany(Grade::class); // A student can have multiple grades
    }
}
