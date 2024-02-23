<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CareerResource;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerOpportunityController extends Controller
{
  public function index()
  {
    $data = Career::list();
    $data = CareerResource::collection($data);
    return $this->ok($data);
  }
}