<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentActivityResource;
use App\Models\StudentActivity;
use Illuminate\Http\Request;

class StudentActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StudentActivity::list();
        $data = StudentActivityResource::collection($data);
        return $this->ok($data);
    }
}
