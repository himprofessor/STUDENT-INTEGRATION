<?php

namespace App\Http\Controllers\department_staff;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('created_at', 'desc')->with('media')->paginate(4);

        $totalDepartments = Department::count();

        return view('content.department.list', compact('departments', 'totalDepartments'));
    }

    public function create()
    {
        $media = Media::all();
        return view('content.department.create', compact('media'));
    }

    // Search

    public function search(Request $request)
{
    $searchDepartment = $request->input('search');
    $departments = Department::where('department_name', 'like', '%' . $searchDepartment . '%')
        ->orderBy('id', 'desc')
        ->paginate(2);

    $totalDepartments = Department::count();

    return view('content.department.list', compact('departments', 'searchDepartment', 'totalDepartments'));
}

    public function store(Request $request)
    {
        DB::beginTransaction();

        Department::store($request);

        DB::commit();

        return redirect()->route('department')->with('success', 'Department has been created successfully.');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('content.department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        Department::store($request, $id);

        DB::commit();

        // Redirect back to the department list or a success page
        return redirect()->route('department', $id)->with('success', 'Department has been updated successfully.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        // Find the department by its ID and delete it
        $department = Department::find($id);

        if ($department->media) {
            $department->media->delete();
        }

        DB::commit();

        // Redirect back to the department list or a success page
        return redirect()->route('department')->with('success', 'Department has been deleted successfully.');
    }
}
