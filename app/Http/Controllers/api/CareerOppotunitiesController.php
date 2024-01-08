<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CareerResource;
use App\Models\CareerOpportunity;
use Illuminate\Http\Request;

class CareerOppotunitiesController extends Controller
{
  public function index()
  {
    $data = CareerOpportunity::list();
    $data = CareerResource::collection($data);
    return $this->ok($data);
  }
}
