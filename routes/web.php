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
  });
  //staff
  Route::prefix('staff')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\department_staff\StaffController@index')->name('staff');
    Route::get('/create', $controller_path . '\department_staff\StaffController@create')->name('staff.create');
    Route::post('/store', $controller_path . '\department_staff\StaffController@store')->name('staff.store');
    Route::get('/edit/{id}', $controller_path . '\department_staff\StaffController@edit')->name('staff.edit');
    Route::put('/edit/{id}', $controller_path . '\department_staff\StaffController@update')->name('staff.update');
    Route::delete('/delete/{id}', $controller_path . '\department_staff\StaffController@destroy')->name('staff.destroy');
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
});

//route career opportunities
Route::prefix('career-opportunities')->group(function () use ($controller_path) {
  Route::get('/', $controller_path . '\career_opportunity\CareerOpportunitiesController@index')->name('career-opportunities');
  Route::get('/create', $controller_path . '\career_opportunity\CareerOpportunitiesController@create')->name('career-opportunities.create');
  Route::post('/store', $controller_path . '\career_opportunity\CareerOpportunitiesController@store')->name('career-opportunities.store');
  Route::get('/edit/{id}', $controller_path . '\career_opportunity\CareerOpportunitiesController@edit')->name('career-opportunities.edit');
  Route::put('/edit/{id}', $controller_path . '\career_opportunity\CareerOpportunitiesController@update')->name('career-opportunities.update');
  Route::delete('/delete/{id}', $controller_path . '\career_opportunity\CareerOpportunitiesController@destroy')->name('career-opportunities.destroy');
});

//route slideshow
Route::prefix('slideshow')->group(function () use ($controller_path){
  Route::get('/', $controller_path . '\slideshow\SlideshowController@index')->name('slideshow');
  Route::get('/create', $controller_path . '\slideshow\SlideshowController@create')->name('slideshow.create');
  Route::post('/store', $controller_path . '\slideshow\SlideshowController@store')->name('slideshow.store');
  Route::get('/edit/{id}', $controller_path . '\slideshow\SlideshowController@edit')->name('slideshow.edit');
  Route::put('/edit/{id}', $controller_path . '\slideshow\SlideshowController@update')->name('slideshow.update');
  Route::delete('/delete/{id}', $controller_path . '\slideshow\SlideshowController@destroy')->name('slideshow.destroy');
  
});


