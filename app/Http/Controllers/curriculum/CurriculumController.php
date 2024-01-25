<?php

namespace App\Http\Controllers\curriculum;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurriculumController extends Controller
{
    public static function index()
    {
        $curriculums = Curriculum::orderBy('created_at', 'desc')->with('media')->paginate(10);
        return view('content.curriculum.list', compact('curriculums'));
    }
    public function create()
    {
        $media = Media::all();
        $curriculum = new Curriculum();
        return view('content.curriculum.create', compact('curriculum', 'media'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        Curriculum::store($request);
        DB::commit();
        return redirect('curriculum')->with('success', 'curriculum has been created successfully.');
    }
    public function edit($id)
    {
        $curriculum = Curriculum::find($id);
        return view('content.curriculum.edit', compact('curriculum'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        Curriculum::store($request, $id);
        DB::commit();
        return redirect('curriculum');
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        //find staff by id and delete
        $curriculums = Curriculum::find($id);
        if ($curriculums->media) {
            $curriculums->media->delete();
        }
        DB::commit();
        return redirect('curriculum');
    }
    public function search(Request $request)
    {
        $searchCurriculum = Curriculum::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->paginate(10);
        if ($request->ajax()) {
            return view('content.curriculum.table', ['curriculums' => $searchCurriculum])->render();
        } else {
            return view('content.curriculum.list', ['curriculums' => $searchCurriculum]);
        }
    }

    
}
