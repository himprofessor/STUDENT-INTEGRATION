<?php

namespace App\Http\Controllers\department_staff;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('created_at', 'desc')->paginate(10);

        return view('content.department.list', compact('departments'));
    }

    public function create()
    {

        return view('content.department.create');
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

        if ($department) {

            $department->delete();
        }

        DB::commit();

        // Redirect back to the department list or a success page
        return redirect()->route('department')->with('success', 'Department has been deleted successfully.');

    }
}
