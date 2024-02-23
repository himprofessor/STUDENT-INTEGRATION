<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurriculumResources;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
  public function index()
  {
    $data = Curriculum::list();
    $data = CurriculumResources::collection($data);
    return $this->ok($data);
  }
}