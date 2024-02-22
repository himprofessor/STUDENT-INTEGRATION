<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\api\CareerOpportunityController;
use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Course;
use App\Models\Department;
use App\Models\Internships;
use App\Models\Partnership;
use App\Models\Staff;
use App\Models\StudentActivity;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
  public static function index()
  {
    $staffs = Staff::all();
    $departments = Department::all();
    $terms = Term::all();
    $courses = Course::all();
    $subjects = Subject::all();
    return view('content.dashboard.dashboards-analytics', compact('staffs','departments','terms','courses','subjects'));
  }
}