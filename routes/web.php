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

// Route of table staff
Route::prefix('staff')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\department_staff\StaffController@index')->name('staff');
    Route::get('/create', $controller_path . '\department_staff\StaffController@create')->name('staff.create');
    Route::post('/store', $controller_path . '\department_staff\StaffController@store')->name('staff.store');
    Route::get('/edit/{id}', $controller_path . '\department_staff\StaffController@edit')->name('staff.edit');
    Route::put('/edit/{id}', $controller_path . '\department_staff\StaffController@update')->name('staff.update');
    Route::delete('/delete/{id}', $controller_path . '\department_staff\StaffController@destroy')->name('staff.destroy');
});
