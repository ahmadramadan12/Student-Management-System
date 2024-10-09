<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;


class student extends Model
{
    use HasFactory;

    protected $fillable =['name','email','date_of_birth'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }

public function grades()
{
    return $this->hasMany(Grade::class);
}

}
