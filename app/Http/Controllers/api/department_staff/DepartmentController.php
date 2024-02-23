<?php

namespace App\Http\Controllers\api\department_staff;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = Department::list();
        $data = DepartmentResource::collection($data);
        return $this->ok($data);
    }
}