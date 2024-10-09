<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\API\StudentController;
use App\http\Controllers\API\CourseController;
use App\http\Controllers\API\GradeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');

Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');

Route::get('/students/{student}/courses', [CourseController::class, 'coursesByStudent'])->name('courses.by_student');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/grades/create', [GradeController::class, 'create'])->name('grades.create');
Route::post('/grades', [GradeController::class, 'store'])->name('grades.store');
Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');

Route::get('/grades/{grade}/edit', [GradeController::class, 'edit'])->name('grades.edit');
Route::put('/grades/{grade}', [GradeController::class, 'update'])->name('grades.update');