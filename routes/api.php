<?php

use App\Http\Controllers\api\CareerOppotunitiesController;
use App\Http\Controllers\api\department_staff\DepartmentController;
use App\Http\Controllers\api\department_staff\StaffController;
use App\Http\Controllers\career_opportunity\CareerOpportunitiesController;
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
});

// staff
Route::prefix('staff-list')->group(function () {
  Route::get('/list', [StaffController ::class, 'index']);
});

// department
Route::prefix('department-list')->group(function () {
  Route::get('/list', [DepartmentController ::class, 'index']);
});

// careeroppotunities
Route::prefix('career-opportunity')->group(function () {
  Route::get('/list', [CareerOppotunitiesController ::class, 'index']);
});

