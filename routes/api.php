<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/courses', [TestController::class, 'showCourses']);
Route::get('/lessons', [TestController::class, 'showLessons']);

Route::post('/create-course', [TestController::class, 'createCourse']);
Route::post('/create-lesson', [TestController::class, 'createLesson']);

Route::put('/update-price/course/{course:name}', [TestController::class, 'updateCoursePrice']);
Route::put('/update-price/lesson/{lesson:name}', [TestController::class, 'updateLessonPrice']);

