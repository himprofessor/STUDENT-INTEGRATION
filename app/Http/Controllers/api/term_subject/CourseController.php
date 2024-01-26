<?php

namespace App\Http\Controllers\api\term_subject;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
  public function index()
  {
    $data = Course::list();
    $data = CourseResource::collection($data);
    return $this->ok($data);
  }
}