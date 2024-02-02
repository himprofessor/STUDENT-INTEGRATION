<?php

namespace App\Http\Controllers\impact;

use App\Http\Controllers\Controller;
use App\Models\Impact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImpactController extends Controller
{
    public static function index(){
      
        $impacts = Impact::orderBy('created_at', 'desc')->paginate(10);
        return view('content.impact.list', compact('impacts'));
    }
    public function create()
    {
        $impacts = new Impact();
        return view('content.impact.create', compact('impacts'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        Impact::store($request);
        DB::commit();
        return redirect('impact')->with('success', 'impact has been created successfully.');
    }
    public function edit($id)
    {
        $impact = Impact::find($id);
        return view('content.impact.edit', compact('impact'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        Impact::store($request, $id);
        DB::commit();
        return redirect('impact')->with('success', 'impact has been update successfully.');
    }
    public function destroy($id){
        DB::beginTransaction();
        $impacts = Impact::find($id);
        $impacts->delete();
        DB::commit();
        return redirect('impact')->with('success', 'impact has been delete successfully.');
    }
    public function search(Request $request) {
        $searchImpact = Impact::where("data", "like", "%" . $request->search . "%")->paginate(10);
        if ($request->ajax()) {
            return view('content.impact.table', ['impacts' => $searchImpact])->render();
        } else {
            return view('content.impact.list', ['impacts' => $searchImpact]);
        }
    }
}
