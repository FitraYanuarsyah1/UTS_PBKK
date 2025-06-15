<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import semua controller yang digunakan
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\LecturerController;
use App\Http\Controllers\API\EnrollmentController;
use App\Http\Controllers\API\CourseLecturerController;
use App\Http\Controllers\AuthController;

//  Route API Resource (CRUD)
Route::apiResource('studnts', StudentController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('lecturers', LecturerController::class);
Route::apiResource('enrollments', EnrollmentController::class);
Route::apiResource('course-lecturers', CourseLecturerController::class);

//  Auth manual (tanpa sanctum/jwt)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Optional: Route default check
Route::get('/ping', function () {
    return response()->json(['message' => 'API is running']);
});
