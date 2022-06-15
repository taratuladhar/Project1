<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;

// function ko satta controller call garcha aba
Route::get('register',[UserController::class,'create']);
Route::post('register',[UserController::class,'store']);
Route::any('login',[UserController::class,'login'])->name('login');


Route::group(['middleware' =>'loginValidatorMiddleware'],function(){
   Route::get('logout', [UserCOntroller::class,'logout']); 

   Route::get('',function(){
    return view('index');
   });
    

Route::get('/add-student',[StudentController::class,'create'])->name('OpenStudentForm');  //StudentController vitra ko create function call garne
// OR Route::get('/add-student',[StudentController::class,'create']);
Route::post('/add-student',[StudentController::class,'create'])->name('addStudent');
// Route::any('/add-student',[StudentController::class,'create']);
// Route::get('/display-student',[StudentController::class,'index'])->middleware('mymid'); //routemiddleware
Route::get('/display-student',[StudentController::class,'index']);

Route::get('/delete-student/{id}',[StudentController::class,'destroy']);
Route::any('/edit-student/{id}',[StudentController::class,'edit']);
Route::any('/view-student/{id}',[StudentController::class,'show']);
Route::any('student/toggleStatus',[StudentController::class,'toggleStatus']);



Route::any('/add-course',[CourseController::class,'create']);
Route::get('/display-course',[CourseController::class,'index'])->name('displayCourse');
Route::get('/delete-course/{id}',[CourseController::class,'destroy']);
Route::any('/edit-course/{id}',[CourseController::class,'edit']);
Route::get('/view-course/{id}',[CourseController::class,'show'])->name('viewCourse');
Route::any('course/toggleStatus',[CourseController::class,'toggleStatus']);

Route::get('add-student-course',[StudentCourseController::class,'create'])->name('addstudentcourse');
Route::post('add-student-course',[StudentCourseController::class,'store'])->name('storestudentcourse');
Route::any('display-student-course',[StudentCourseController::class,'index'])->name('displaystudentcourse');
Route::get('edit-student-course/{id}',[StudentCourseController::class,'edit'])->name('editstudentcourse');
Route::post('/update-student-course',[StudentCourseController::class,'update'])->name('updatestudentcourse');
Route::any('delete-student-course/{id}',[StudentCourseController::class,'destroy'])->name('deletestudentcourse');

});

// Route::get('/add-student',function()
// {
//     return view('pages.student.add');
// });

// Route::get('/add-course',function()
// {
//     return view('pages.course.add');
// });

// Route::get('/display-student',function()
// {
//     return view('pages.student.display');
// });

// Route::get('/display-course',function()
// {
//     return view('pages.course.display');
// });
