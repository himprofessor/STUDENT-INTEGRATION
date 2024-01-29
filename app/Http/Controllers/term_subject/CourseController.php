<?php

namespace App\Http\Controllers\term_subject;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
  public static function index()
  {
    $courses = Course::orderBy('created_at', 'desc')->paginate(10);
    return view('content.course.list', compact('courses'));
  }
  public function create()
  {
    $courses = new Course();
    return view('content.course.create', compact('courses'));
  }
  public function store(Request $request)
  {
    DB::beginTransaction();
    Course::store($request);
    DB::commit();
    return redirect('term&subject/course')->with('success', 'courses has been created successfully.');
  }
  public function edit($id)
  {
    $courses = Course::find($id);
    return view('content.course.edit', compact('courses'));
  }
  public function update(Request $request, $id)
  {
    DB::beginTransaction();
    Course::store($request, $id);
    DB::commit();
    return redirect('term&subject/course');
  }
  public function destroy($id)
  {
    DB::beginTransaction();
    $courses = Course::find($id);
    $courses->delete();
    DB::commit();
    return redirect('term&subject/course');
  }
  public function search(Request $request)
  {
    $searchCourse = Course::where('course_name', 'like', '%' . $request->search . '%')->paginate(10);
    if ($request->ajax()) {
      return view('content.course.table', ['courses' => $searchCourse])->render();
    } else {
      return view('content.course.list', ['courses' => $searchCourse]);
    }
  }
}