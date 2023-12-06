<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/', $controller_path . '\dashboard\AnalyticsController@index')->name('dashboard-analytics');

// Department and Staff
Route::prefix('department&staff/')->group(function () use ($controller_path) {
  // department
  Route::prefix('department')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\department_staff\DepartmentController@index')->name('department');
    Route::get('/create', $controller_path . '\department_staff\DepartmentController@create')->name('department.create');
    Route::post('/store', $controller_path . '\department_staff\DepartmentController@store')->name('department.store');
    Route::get('/edit/{id}', $controller_path . '\department_staff\DepartmentController@edit')->name('department.edit');
    Route::put('/edit/{id}', $controller_path . '\department_staff\DepartmentController@update')->name('department.update');
    Route::delete('/delete/{id}', $controller_path . '\department_staff\DepartmentController@destroy')->name('department.destroy');
    Route::get('/search', $controller_path . '\department_staff\DepartmentController@search')->name('department.search');
  });
  //staff
  Route::prefix('staff')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\department_staff\StaffController@index')->name('staff');
    Route::get('/create', $controller_path . '\department_staff\StaffController@create')->name('staff.create');
    Route::post('/store', $controller_path . '\department_staff\StaffController@store')->name('staff.store');
    Route::get('/edit/{id}', $controller_path . '\department_staff\StaffController@edit')->name('staff.edit');
    Route::put('/edit/{id}', $controller_path . '\department_staff\StaffController@update')->name('staff.update');
    Route::delete('/delete/{id}', $controller_path . '\department_staff\StaffController@destroy')->name('staff.destroy');
    Route::get('/search', $controller_path . '\department_staff\StaffController@search')->name('staff.search');
  });
});

//route user
Route::prefix('user')->group(function () use ($controller_path) {
  Route::get('/', $controller_path . '\user\UserController@index')->name('user');
  Route::get('/create', $controller_path . '\user\UserController@create')->name('user.create');
  Route::post('/store', $controller_path . '\user\UserController@store')->name('user.store');
  Route::get('/edit/{id}', $controller_path . '\user\UserController@edit')->name('user.edit');
  Route::put('/edit/{id}', $controller_path . '\user\UserController@update')->name('user.update');
  Route::delete('/delete/{id}', $controller_path . '\user\UserController@destroy')->name('user.destroy');
  Route::get('/search', $controller_path . '\user\UserController@search')->name('user.search');


  Route::get('/login', $controller_path . '\user\UserController@showLoginForm')->name('user.login');
  Route::post('/login', $controller_path . '\user\UserController@login');
  Route::post('/logout', $controller_path . '\user\UserController@logout')->name('user.logout');
});

//route career opportunities
Route::prefix('career-opportunities')->group(function () use ($controller_path) {
  Route::get('/', $controller_path . '\career_opportunity\CareerOpportunitiesController@index')->name('career-opportunities');
  Route::get('/create', $controller_path . '\career_opportunity\CareerOpportunitiesController@create')->name('career-opportunities.create');
  Route::post('/store', $controller_path . '\career_opportunity\CareerOpportunitiesController@store')->name('career-opportunities.store');
  Route::get('/edit/{id}', $controller_path . '\career_opportunity\CareerOpportunitiesController@edit')->name('career-opportunities.edit');
  Route::put('/edit/{id}', $controller_path . '\career_opportunity\CareerOpportunitiesController@update')->name('career-opportunities.update');
  Route::delete('/delete/{id}', $controller_path . '\career_opportunity\CareerOpportunitiesController@destroy')->name('career-opportunities.destroy');
  Route::get('/search', $controller_path . '\career_opportunity\CareerOpportunitiesController@search')->name('career-opportunities.search');
});

//route slideshow
Route::prefix('slideshow')->group(function () use ($controller_path) {
  Route::get('/', $controller_path . '\slideshow\SlideshowController@index')->name('slideshow');
  Route::get('/create', $controller_path . '\slideshow\SlideshowController@create')->name('slideshow.create');
  Route::get('/search', $controller_path . '\slideshow\SlideshowController@search')->name('slideshow.search');

  Route::post('/store', $controller_path . '\slideshow\SlideshowController@store')->name('slideshow.store');
  Route::get('/edit/{id}', $controller_path . '\slideshow\SlideshowController@edit')->name('slideshow.edit');
  Route::put('/edit/{id}', $controller_path . '\slideshow\SlideshowController@update')->name('slideshow.update');
  Route::delete('/delete/{id}', $controller_path . '\slideshow\SlideshowController@destroy')->name('slideshow.destroy');

  //Crop image
  Route::post('/{id}/crop', $controller_path . '\slideshow\SlideshowController@crop')->name('slideshow.uploadCroppedImage');

});

//route student activities
Route::prefix('student-activities')->group(function () use ($controller_path) {
  Route::get('/', $controller_path . '\student_activity\StudentActivitiesController@index')->name('student-activities');
  Route::get('/create', $controller_path . '\student_activity\StudentActivitiesController@create')->name('student-activities.create');
  Route::post('/store', $controller_path . '\student_activity\StudentActivitiesController@store')->name('student-activities.store');
  Route::get('/edit/{id}', $controller_path . '\student_activity\StudentActivitiesController@edit')->name('student-activities.edit');
  Route::put('/edit/{id}', $controller_path . '\student_activity\StudentActivitiesController@update')->name('student-activities.update');
  Route::delete('/delete/{id}', $controller_path . '\student_activity\StudentActivitiesController@destroy')->name('student-activities.destroy');
  Route::get('/search', $controller_path . '\student_activity\StudentActivitiesController@search')->name('student-activities.search');
});