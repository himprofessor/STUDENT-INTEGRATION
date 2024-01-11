<?php

namespace App\Http\Controllers\career;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CareerController extends Controller
{
  public static function index()
  {
      $careers = Career::orderBy('created_at', 'desc')->with('media')->paginate(10);
      return view('content.career.list', compact('careers'));
  }
  public function create()
  {
      $media = Media::all();
      $career = new Career();
      return view('content.career.create', compact('career', 'media'));
  }
  public function store(Request $request)
  {
      DB::beginTransaction();
      Career::store($request);
      DB::commit();
      return redirect('career')->with('success', 'career has been created successfully.');
  }
  public function edit($id)
  {
      $career = Career::find($id);
      return view('content.career.edit', compact('career'));
  }
  public function update(Request $request, $id)
  {
      DB::beginTransaction();
      Career::store($request, $id);
      DB::commit();
      return redirect('career');
  }
  public function destroy($id)
  {
      DB::beginTransaction();
      //find staff by id and delete
      $careers = Career::find($id);
      if ($careers->media) {
          $careers->media->delete();
      }
      DB::commit();
      return redirect('career');
  }
  public function search(Request $request)
  {
      $searchCareer = Career::where('title', 'like', '%' . $request->search . '%')
          ->orWhere('description', 'like', '%' . $request->search . '%')
          ->paginate(10);
      if ($request->ajax()) {
          return view('content.career.table', ['careers' => $searchCareer])->render();
      } else {
          return view('content.career.list', ['careers' => $searchCareer]);
      }
  }
}
