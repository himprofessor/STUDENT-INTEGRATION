<?php

namespace App\Http\Controllers\term_subject;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TermController extends Controller
{
  public function index()
  {
    $terms = Term::orderBy('created_at', 'desc')->paginate(10);
    return view('content.term.list', compact('terms'));
  }
  public function store(Request $request)
  {
    DB::beginTransaction();
    Term::store($request);
    DB::commit();
    return redirect('term&subject/term')->with('success', 'term has been created successfully.');
  }
  public function edit($id)
  {
    $terms = Term::find($id);
    return view('content.term.edit', compact('terms'));
  }
  public function update(Request $request, $id)
  {
    DB::beginTransaction();
    Term::store($request, $id);
    DB::commit();
    return redirect('/term&subject/term')->with('success', 'Term has been updated successfully.');
  }
  public function destroy($id)
  {
    DB::beginTransaction();
    $terms = Term::find($id);
    $terms->delete();
    DB::commit();
    return redirect('/term&subject/term')->with('success', 'term has been deleted successfully.');
  }
  public function search(Request $request)
  {
    $searchterm = Term::where('term_name', 'like', '%' . $request->search . '%')
      ->paginate(10);
    if ($request->ajax()) {
      return view('content.term.table', ['terms' => $searchterm])->render();
    } else {
      return view('content.term.list', ['terms' => $searchterm]);
    }
  }
}
