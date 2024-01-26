<?php

namespace App\Http\Controllers\api\term_subject;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
  public function index()
  {
    $data = Subject::list();
    $data = SubjectResource::collection($data);
    return $this->ok($data);
  }
}