<?php

use App\Http\Controllers\api\CareerOpportunityController;
use App\Http\Controllers\api\CurriculumController;
use App\Http\Controllers\api\department_staff\DepartmentController;
use App\Http\Controllers\api\department_staff\StaffController;
use App\Http\Controllers\api\ImpactController;
use App\Http\Controllers\api\term_subject\TermController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\api\StudentActivityController;
use App\Http\Controllers\api\SlideshowController;
use App\Http\Controllers\api\term_subject\CourseController;
use App\Http\Controllers\api\term_subject\SubjectController as Term_subjectSubjectController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

//slideshow
Route::prefix('slideshow')->group(function () {
  Route::get('/list', [SlideshowController::class, 'index']);
});
// studentActivity
Route::prefix('student-activity')->group(function () {
  Route::get('/list', [StudentActivityController::class, 'index']);
  Route::get('/list/{id}', [StudentActivityController::class, 'getOne']);
});
// careeroppotunities
Route::prefix('career')->group(function () {
  Route::get('/list', [CareerOpportunityController::class, 'index']);
});

//curriculum
Route::prefix('curriculum')->group(function() {
  Route::get('/list', [CurriculumController::class, 'index']);
});

// staff and department
Route::prefix('staff-list')->group(function () {
  Route::get('/list', [StaffController ::class, 'index']);
});
Route::prefix('department-list')->group(function () {
  Route::get('/list', [DepartmentController ::class, 'index']);
});

// course, subject and term
Route::prefix('course')->group(function () {
  Route::get('/list', [CourseController::class, 'index']);
});

// term
Route::prefix('subject')->group(function () {
  Route::get('/list', [Term_subjectSubjectController::class, 'index']);
});
Route::prefix('term')->group(function () {
  Route::get('/list', [TermController::class, 'index']);
});

//impact
Route::prefix('impact')->group(function() {
  Route::get('/list', [ImpactController::class, 'index']);
});

