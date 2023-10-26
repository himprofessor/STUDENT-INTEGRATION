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

Route::prefix('course')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\course\CourseController@index')->name('course');
    Route::get('/create', $controller_path . '\course\CourseController@create')->name('course.create');
    Route::post('/store', $controller_path . '\course\CourseController@store')->name('course.store');
    Route::get('/edit/{id}', $controller_path . '\course\CourseController@edit')->name('course.edit');
    Route::put('/edit/{id}', $controller_path . '\course\CourseController@update')->name('course.update');
    Route::delete('/delete/{id}', $controller_path . '\course\CourseController@destroy')->name('course.destroy');
});


