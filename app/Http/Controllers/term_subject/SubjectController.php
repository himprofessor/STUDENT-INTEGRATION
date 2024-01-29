<?php

namespace App\Http\Controllers\term_subject;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
  public static function index()
  {
    $subjects = Subject::orderBy('created_at', 'desc')->paginate(10);
    return view('content.subject.list', compact('subjects'));
  }
  public function create()
  {
    $subjects = new Subject();
    $courses = Course::all();
    $terms = Term::all();
    return view('content.subject.create', compact('subjects', 'courses', 'terms'));
  }
  public function store(Request $request)
  {
    DB::beginTransaction();
    Subject::store($request);
    DB::commit();
    return redirect('term&subject/subject')->with('success', 'subject has been created successfully.');
  }
  public function edit($id)
  {
    $subjects = Subject::find($id);
    $courses = Course::all();
    $terms = Term::all();
    return view('content.subject.edit', compact('subjects', 'courses', 'terms'));
  }
  public function update(Request $request, $id)
  {
    DB::beginTransaction();
    Subject::store($request, $id);
    DB::commit();
    return redirect('term&subject/subject');
  }
  public function destroy($id)
  {
    DB::beginTransaction();
    $subjects = Subject::find($id);
    $subjects->delete();
    DB::commit();
    return redirect('term&subject/subject');
  }
  public function search(Request $request)
  {
    $searchSubject = Subject::where('subject_name', 'like', '%' . $request->search . '%')->paginate(10);
    if ($request->ajax()) {
      return view('content.subject.table', ['subjects' => $searchSubject])->render();
    } else {
      return view('content.subject.list', ['subjects' => $searchSubject]);
    }
  }
}