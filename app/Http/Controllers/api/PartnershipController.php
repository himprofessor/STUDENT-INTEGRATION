<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnershipResource;
use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index(){
        $data = Partnership::list();
        $data = PartnershipResource::collection($data);
        return $this->ok($data);
    }
}