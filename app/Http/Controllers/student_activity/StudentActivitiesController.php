<?php

namespace App\Http\Controllers\student_activity;

use App\Http\Controllers\Controller;
use App\Models\StudentActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentActivitiesController extends Controller
{
    public static function index()
    {
        $studentactivities = StudentActivity::orderBy('created_at', 'desc')->paginate(10);
        return view('content.student-activity.list', compact('studentactivities'));
    }
    public function create()
    {
        $studentactivities = new StudentActivity();
        return view('content.student-activity.create', compact('studentactivities'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        StudentActivity::store($request);
        DB::commit();
        return redirect('/student-activities')->with('success', 'student activity has been created successfully.');
    }
    public function edit($id)
    {
        $studentactivities = StudentActivity::find($id);
        $users = User::all();
        $userselete = $studentactivities->user;
        return view('content.student-activity.edit', compact('studentactivities', 'users', 'userselete'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        StudentActivity::store($request, $id);
        DB::commit();
        return redirect('student-activities');
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        // Find student activity by id
        $studentactivities = StudentActivity::find($id);
        if ($studentactivities) {
            // Delete media records(associated)
            $media = $studentactivities->media;
            foreach ($media as $med) {
                $med->delete();
            }
            // Delete the student activity
            $studentactivities->delete();
        }
        DB::commit();
        return redirect('student-activities');
    }
    public function search(Request $request)
    {
        $studentactivities = StudentActivity::where("title", "like", "%" . $request->search . "%")->paginate(10);
        if ($request->ajax()) {
            return view('content.student-activity.table', ['studentactivities' => $studentactivities])->render();
        } else {
            return view('content.student-activity.list', ['studentactivities' => $studentactivities]);
        }
    }
}