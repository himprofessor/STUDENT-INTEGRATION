<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DisciplineResources;
use App\Models\Discipline;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    public function index()
    {
        $data = Discipline::list();
        $data = DisciplineResources::collection($data);
        return $this->ok($data);
    }
}