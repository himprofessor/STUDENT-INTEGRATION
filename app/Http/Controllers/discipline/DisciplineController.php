<?php

namespace App\Http\Controllers\discipline;

use App\Http\Controllers\Controller;
use App\Models\discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplineController extends Controller
{
    public function index()
    {
        $rules = Discipline::orderBy('created_at', 'desc')->paginate(10);
        return view('content.discipline.list', compact('rules'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        $model = new Discipline();
        $fileID = $model->upload($request, null);
        DB::commit();
        if ($fileID) {
            return redirect('/disciplines-home')->with('Created successfully.');
        }
        return redirect('/disciplines-home')->with('Failed to create discipline.');
    }
    public function edit($id)
    {
        $rules = Discipline::find($id);
        return view('content.discipline.edit', compact('rules'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $discipline = Discipline::findOrFail($id);
            
            // Handle file upload
            $newFile = $request->file('file');
            if ($newFile) {
                // get original file name 
                $originalFileName = $newFile->getClientOriginalName();
                // Store the new file
                $path = $newFile->store('public/assets/pdf');
                $pdf = str_replace('public/', '', $path);
    
                // Update the file path in the database
                $discipline->update(['file' => $pdf, 'original_name_file' => $originalFileName]);
            }
    
            DB::commit();
            return redirect('/disciplines-home')->with('success', 'Discipline updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/disciplines-home')->with('error', 'Failed to update discipline.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $rules = Discipline::find($id);
        $rules->delete();
        DB::commit();
        return redirect('/disciplines-home')->with('Deleted successfully.');
    }
    public function search(Request $request)
    {
        $searchrule = Discipline::where('original_name_file', 'like', '%' . $request->get('search') . '%')->get();
        if ($request->ajax()) {
            return view('content.discipline.table', ['rules' => $searchrule])->render();
        } else {
            return view('content.discipline.list', ['rules' => $searchrule]);
        }
    }
}