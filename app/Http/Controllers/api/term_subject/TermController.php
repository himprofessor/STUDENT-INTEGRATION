<?php

namespace App\Http\Controllers\api\term_subject;

use App\Http\Controllers\Controller;
use App\Http\Resources\TermResource;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
  public function index()
    {
        $data = Term::list();
        $data = TermResource::collection($data);
        return $this->ok($data);
    }
}
