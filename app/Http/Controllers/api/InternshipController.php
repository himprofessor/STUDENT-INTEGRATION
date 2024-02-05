<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InternshipResource;
use App\Models\Internships;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        $data = Internships::list();
        $data = InternshipResource::collection($data);
        return $this->ok($data);
    }
}