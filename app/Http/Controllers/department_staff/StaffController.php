<?php

namespace App\Http\Controllers\department_staff;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Models\Department;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public static function index()
    {
        $staffs = Staff::orderBy('created_at', 'desc')->with('department')->paginate(10);
        return view('content.staff.list', compact('staffs'));
    }
    public function create()
    {
        $departments = Department::all();
        $staff = new Staff();
        return view('content.staff.create', compact('departments', 'staff'));
    }
    public function store(StaffRequest $request)
    {
        DB::beginTransaction();
        Staff::store($request);
        DB::commit();
        return redirect('/staff')->with('success', 'Staff has been created successfully.');
    }
    public function edit($id)
    {
        $staff = Staff::find($id);
        $departments = Department::all();
        $departmentselete = $staff->department;
        return view('content.staff.edit', compact('staff', 'departments', 'departmentselete'));
    }
    public function update(StaffRequest $request, $id)
    {
        DB::beginTransaction();
        Staff::store($request, $id);
        DB::commit();
        return redirect('/staff');
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        //find staff by id and delete
        $staffs = Staff::find($id);
        if ($staffs) {
            $staffs->delete();
        }
        DB::commit();
        return redirect('/staff');
    }
}
