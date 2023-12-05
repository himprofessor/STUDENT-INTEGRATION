<?php

namespace App\Http\Controllers\department_staff;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Staff;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public static function index()
    {
        $staffs = Staff::orderBy('created_at', 'desc')->with('media')->paginate(10);
        return view('content.staff.list', compact('staffs'));
    }
    public function create()
    {
        $media = Media::all();
        $departments = Department::all();
        $staff = new Staff();
        return view('content.staff.create', compact('departments', 'staff', 'media'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        Staff::store($request);
        DB::commit();
        return redirect('department&staff/staff')->with('success', 'Staff has been created successfully.');
    }
    public function edit($id)
    {
        $staff = Staff::find($id);
        $departments = Department::all();
        $departmentselete = $staff->department;
        return view('content.staff.edit', compact('staff', 'departments', 'departmentselete'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        Staff::store($request, $id);
        DB::commit();
        return redirect('department&staff/staff');
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        //find staff by id and delete
        $staffs = Staff::find($id);
        if ($staffs->media) {
            $staffs->media->delete();
        }
        DB::commit();
        return redirect('department&staff/staff');
    }
    public function search(Request $request)
    {
        $searchStaff = Staff::where('first_name', 'like', '%' . $request->search . '%')
            ->orWhere('last_name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->paginate(10);
        if ($request->ajax()) {
            return view('content.staff.table', ['staffs' => $searchStaff])->render();
        } else {
            return view('content.staff.list', ['staffs' => $searchStaff]);
        }
    }
}