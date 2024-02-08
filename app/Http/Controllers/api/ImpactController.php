<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImpactResources;
use App\Models\Impact;
use Illuminate\Http\Request;

class ImpactController extends Controller
{
    public function index(){
        $data = Impact::list();
        $data = ImpactResources::collection($data);
        return $this->ok($data);
    }
    
}
