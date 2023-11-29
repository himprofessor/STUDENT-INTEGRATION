<?php

namespace App\Http\Controllers\career_opportunity;

use App\Http\Controllers\Controller;
use App\Models\CareerOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareerOpportunitiesController extends Controller
{
    public static function index()
    {
        $careeropportunities = CareerOpportunity::orderBy('created_at','desc')->paginate(10);
        return view('content.career-opportunity.list', compact('careeropportunities'));
    }

    public function create()
    {
        return view('content.career-opportunity.create');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        CareerOpportunity::store($request);
        DB::commit();
        return redirect('career-opportunities')->with('success', 'career opportunity has been created successfully.');
    }
    public function edit($id)
    {
        $careeropportunities = CareerOpportunity::find($id);
        return view('content.career-opportunity.edit', compact('careeropportunities'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        CareerOpportunity::store($request, $id);
        DB::commit();
        return redirect('career-opportunities');
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        //find careeropportunities by id and delete
        $careeropportunities = CareerOpportunity::find($id);
        if ($careeropportunities) {
            $careeropportunities->delete();
        }
        DB::commit();
        return redirect('career-opportunities');
    }
    public function search(Request $request)
    {
      // Your code here
      $career = $request->input('job_title');
      // Assuming you have a method to search career opportunities based on job title
      $careeropportunities = CareerOpportunity::where('job_title', 'like', "%$career%")->paginate(10);
      return view('content.career-opportunity.list', ['careeropportunities' => $careeropportunities]);
    }
}