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
Route::redirect("/", "/dashboard");
Route::get('/login', $controller_path . '\auth\LoginController@showLoginForm')->name('login');
Route::post('/login', $controller_path . '\auth\LoginController@login');

Route::middleware('auth')->group(function () use ($controller_path) {

  Route::post('/logout', $controller_path . '\auth\LoginController@logout')->name('logout');;
  Route::get('/dashboard', $controller_path . '\dashboard\AnalyticsController@index')->name('dashboard-analytics');
  //route user
  Route::prefix('user')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\user\UserController@index')->name('user');
    Route::get('/create', $controller_path . '\user\UserController@create')->name('user');
    Route::post('/store', $controller_path . '\user\UserController@store')->name('user.store');
    Route::get('/edit/{id}', $controller_path . '\user\UserController@edit')->name('user');
    Route::put('/edit/{id}', $controller_path . '\user\UserController@update')->name('user.update');
    Route::delete('/delete/{id}', $controller_path . '\user\UserController@destroy')->name('user.destroy');
    Route::get('/search', $controller_path . '\user\UserController@search')->name('user.search');
    Route::get('/profile', $controller_path . '\user\UserController@profile');
  });

  // Department and Staff
  Route::prefix('department&staff/')->group(function () use ($controller_path) {
    // department
    Route::prefix('department')->group(function () use ($controller_path) {
      Route::get('/', $controller_path . '\department_staff\DepartmentController@index')->name('department&staff-department');
      Route::get('/create', $controller_path . '\department_staff\DepartmentController@create')->name('department&staff-department');
      Route::post('/store', $controller_path . '\department_staff\DepartmentController@store')->name('department.store');
      Route::get('/edit/{id}', $controller_path . '\department_staff\DepartmentController@edit')->name('department&staff-department');
      Route::put('/edit/{id}', $controller_path . '\department_staff\DepartmentController@update')->name('department.update');
      Route::delete('/delete/{id}', $controller_path . '\department_staff\DepartmentController@destroy')->name('department.destroy');
      Route::get('/search', $controller_path . '\department_staff\DepartmentController@search')->name('department.search');
    });
    //staff
    Route::prefix('staff')->group(function () use ($controller_path) {
      Route::get('/', $controller_path . '\department_staff\StaffController@index')->name('department&staff-staff');
      Route::get('/create', $controller_path . '\department_staff\StaffController@create')->name('department&staff-staff');
      Route::post('/store', $controller_path . '\department_staff\StaffController@store')->name('staff.store');
      Route::get('/edit/{id}', $controller_path . '\department_staff\StaffController@edit')->name('department&staff-staff');
      Route::put('/edit/{id}', $controller_path . '\department_staff\StaffController@update')->name('staff.update');
      Route::delete('/delete/{id}', $controller_path . '\department_staff\StaffController@destroy')->name('staff.destroy');
      Route::get('/search', $controller_path . '\department_staff\StaffController@search')->name('staff.search');
    });
  });

  //route slideshow
  Route::prefix('slideshow')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\slideshow\SlideshowController@index')->name('slideshow');
    Route::get('/create', $controller_path . '\slideshow\SlideshowController@create')->name('slideshow');
    Route::post('/store', $controller_path . '\slideshow\SlideshowController@store')->name('slideshow.store');
    Route::get('/edit/{id}', $controller_path . '\slideshow\SlideshowController@edit')->name('slideshow');
    Route::put('/edit/{id}', $controller_path . '\slideshow\SlideshowController@update')->name('slideshow.update');
    Route::delete('/delete/{id}', $controller_path . '\slideshow\SlideshowController@destroy')->name('slideshow.destroy');
    Route::get('/search', $controller_path . '\slideshow\SlideshowController@search')->name('slideshow.search');
  });

  //route student activities
  Route::prefix('student-activities')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\student_activity\StudentActivitiesController@index')->name('student-activities');
    Route::get('/create', $controller_path . '\student_activity\StudentActivitiesController@create')->name('student-activities');
    Route::post('/store', $controller_path . '\student_activity\StudentActivitiesController@store')->name('student-activities.store');
    Route::get('/edit/{id}', $controller_path . '\student_activity\StudentActivitiesController@edit')->name('student-activities');
    Route::put('/edit/{id}', $controller_path . '\student_activity\StudentActivitiesController@update')->name('student-activities.update');
    Route::delete('/delete/{id}', $controller_path . '\student_activity\StudentActivitiesController@destroy')->name('student-activities.destroy');
    Route::get('/search', $controller_path . '\student_activity\StudentActivitiesController@search')->name('student-activities.search');
  });

  //route career
  Route::prefix('career')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\career\CareerController@index')->name('career');
    Route::get('/create', $controller_path . '\career\CareerController@create')->name('career.create');
    Route::post('/store', $controller_path . '\career\CareerController@store')->name('career.store');
    Route::get('/edit/{id}', $controller_path . '\career\CareerController@edit')->name('career.edit');
    Route::put('/edit/{id}', $controller_path . '\career\CareerController@update')->name('career.update');
    Route::delete('/delete/{id}', $controller_path . '\career\CareerController@destroy')->name('career.destroy');
    Route::get('/search', $controller_path . '\career\CareerController@search')->name('career.search');
  });

  //route curriculum
  Route::prefix('curriculum')->group(function () use ($controller_path) {
    Route::get("/",  $controller_path . "\curriculum\CurriculumController@index")->name('curriculum');
    Route::get('/create', $controller_path . '\curriculum\CurriculumController@create')->name('curriculum');
    Route::post('/store', $controller_path . '\curriculum\CurriculumController@store')->name('curriculum.store');
    Route::get('/edit/{id}', $controller_path . '\curriculum\CurriculumController@edit')->name('curriculum');
    Route::put('/edit/{id}', $controller_path . '\curriculum\CurriculumController@update')->name('curriculum.update');
    Route::delete('/delete/{id}', $controller_path . '\curriculum\CurriculumController@destroy')->name('curriculum.destroy');
    Route::get('/search', $controller_path . '\curriculum\CurriculumController@search')->name('curriculum.search');
  });

  //route impact
  Route::prefix('impact')->group(function() use ($controller_path) {
    Route::get('/', $controller_path . '\impact\ImpactController@index')->name('impact');
    Route::get('/create', $controller_path . '\impact\ImpactController@create')->name('impact');
    Route::post('/store', $controller_path . '\impact\ImpactController@store')->name('impact.store');
    Route::get('/edit/{id}', $controller_path . '\impact\ImpactController@edit')->name('impact');
    Route::put('/edit/{id}', $controller_path . '\impact\ImpactController@update')->name('impact.update');
    Route::delete('/delete/{id}', $controller_path . '\impact\ImpactController@destroy')->name('impact.destroy');
    Route::get('/search', $controller_path . '\impact\ImpactController@search')->name('impact.search');
  });

  //Route term, course and subject
  Route::prefix('term&subject/')->group(function () use ($controller_path) {
    // term
    Route::prefix('term')->group(function () use ($controller_path) {
      Route::get('/', $controller_path . '\term_subject\TermController@index')->name('term&subject-term');
      Route::get('/create', $controller_path . '\term_subject\TermController@create')->name('term&subject-term');
      Route::post('/store', $controller_path . '\term_subject\TermController@store')->name('term.store');
      Route::get('/edit/{id}', $controller_path . '\term_subject\TermController@edit')->name('term.edit');
      Route::put('/edit/{id}', $controller_path . '\term_subject\TermController@update')->name('term.update');
      Route::delete('/delete/{id}', $controller_path . '\term_subject\TermController@destroy')->name('term.destroy');
      Route::get('/search', $controller_path . '\term_subject\TermController@search')->name('term.search');
    });
    //subject
    Route::prefix('subject')->group(function () use ($controller_path) {
      Route::get('/', $controller_path . '\term_subject\SubjectController@index')->name('term&subject-subject');
      Route::get('/create', $controller_path . '\term_subject\SubjectController@create')->name('term&subject-subject');
      Route::post('/store', $controller_path . '\term_subject\SubjectController@store')->name('subject.store');
      Route::get('/edit/{id}', $controller_path . '\term_subject\SubjectController@edit')->name('term&subject-subject');
      Route::put('/edit/{id}', $controller_path . '\term_subject\SubjectController@update')->name('subject.update');
      Route::delete('/delete/{id}', $controller_path . '\term_subject\SubjectController@destroy')->name('subject.destroy');
      Route::get('/search', $controller_path . '\term_subject\SubjectController@search')->name('subject.search');
    });
    //course
    Route::prefix('course')->group(function () use ($controller_path) {
      Route::get('/', $controller_path . '\term_subject\CourseController@index')->name('term&subject-course');
      Route::get('/create', $controller_path . '\term_subject\CourseController@create')->name('term&subject-course');
      Route::post('/store', $controller_path . '\term_subject\CourseController@store')->name('course.store');
      Route::get('/edit/{id}', $controller_path . '\term_subject\CourseController@edit')->name('term&subject-course');
      Route::put('/edit/{id}', $controller_path . '\term_subject\CourseController@update')->name('course.update');
      Route::delete('/delete/{id}', $controller_path . '\term_subject\CourseController@destroy')->name('course.destroy');
      Route::get('/search', $controller_path . '\term_subject\CourseController@search')->name('course.search');
    });
  });
  // Route Internships Program 
  Route::prefix('internships-program')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\internships\InternshipController@index')->name('internships-program');
    Route::get('/create', $controller_path . '\internships\InternshipController@create')->name('internships-program');
    Route::post('/store', $controller_path . '\internships\InternshipController@store')->name('internship.store');
    Route::get('/edit/{id}', $controller_path . '\internships\InternshipController@edit')->name('internships-program');
    Route::put('/edit/{id}', $controller_path . '\internships\InternshipController@update')->name('internship.update');
    Route::delete('/delete/{id}', $controller_path . '\internships\InternshipController@destroy')->name('internship.destroy');
    Route::get('/search', $controller_path . '\internships\InternshipController@search')->name('internship.search');
  });

  // Route Disciplines 
  Route::prefix('disciplines-home')->group(function () use ($controller_path) {
    Route::get('/', $controller_path . '\discipline\DisciplineController@index')->name('disciplines-home');
    Route::get('/create', $controller_path . '\discipline\DisciplineController@create')->name('disciplines-home');
    Route::post('/store', $controller_path . '\discipline\DisciplineController@store')->name('disciplines.store');
    Route::get('/edit/{id}', $controller_path . '\discipline\DisciplineController@edit')->name('disciplines.edit');
    Route::put('/edit/{id}', $controller_path . '\discipline\DisciplineController@update')->name('disciplines.update');
    Route::delete('/delete/{id}', $controller_path . '\discipline\DisciplineController@destroy')->name('disciplines.destroy');
    Route::get('/search', $controller_path . '\discipline\DisciplineController@search')->name('disciplines.search');
  });
  //route partnership
  Route::prefix('partnership')->group(function() use ($controller_path) {
    Route::get('/', $controller_path . '\partnership\PartnershipController@index')->name('partnership');
    Route::get('/create', $controller_path . '\partnership\PartnershipController@create')->name('partnership');
    Route::post('/store', $controller_path . '\partnership\PartnershipController@store')->name('partnership.store');
    Route::get('/edit/{id}', $controller_path . '\partnership\PartnershipController@edit')->name('partnership');
    Route::put('/edit/{id}', $controller_path . '\partnership\PartnershipController@update')->name('partnership.update');
    Route::delete('/delete/{id}', $controller_path . '\partnership\PartnershipController@destroy')->name('partnership.destroy');
    Route::get('/search', $controller_path . '\partnership\PartnershipController@search')->name('partnership.search');
  });
});