<?php

namespace App\Http\Controllers\api\department_staff;

use App\Http\Controllers\Controller;
use App\Http\Resources\StaffResource;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $data = Staff::list();
        $data = StaffResource::collection($data);
        return $this->ok($data);
    }
}