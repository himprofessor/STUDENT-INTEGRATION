<?php

namespace App\Http\Controllers\course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(10);

        return view('content.course.list', compact('courses'));
    }
    public function create()
    {
        return view('content.course.create');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();

        Course::store($request);

        DB::commit();

        return redirect('/course')->with('success', 'Course has been created successfully.');
    }
    public function edit($id)
    {
        $course = Course::find($id);

        return view('content.course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        Course::store($request, $id);

        DB::commit();

        // Redirect back to the course list or a success page
        return redirect('/course');
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        // Find the course by its ID and delete it
        $course = Course::find($id);
        if ($course) {
            $course->delete();
        }

        DB::commit();

        // Redirect back to the course list or a success page
        return redirect('/course');
    }
}
