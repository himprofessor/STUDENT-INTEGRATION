<?php

namespace App\Http\Controllers\internships;

use App\Http\Controllers\Controller;
use App\Models\Internships;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InternshipController extends Controller
{
    public static function index()
    {
        $internships = Internships::orderBy('created_at', 'desc')->with('media')->paginate(10);
        return view('content.internships.list', compact('internships'));
    }
    public function create()
    {
        $internships = new Internships();
        return view('content.internships.create', compact('internships'));
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        Internships::store($request);
        DB::commit();
        return redirect('/internships-program')->with('success', 'internship has been created successfully.');
    }
    public function edit($id)
    {
        $internships = Internships::find($id);
        return view('content.internships.edit', compact('internships'));
    }
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        Internships::store($request, $id);
        DB::commit();
        return redirect('/internships-program');
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        // Find student activity by id
        $internships = Internships::find($id);
        if ($internships) {
            // Delete media records(associated)
            $media = $internships->media;
            foreach ($media as $med) {
                $med->delete();
            }
            // Delete the student activity
            $internships->delete();
        }
        DB::commit();
        return redirect('/internships-program');
    }
    public function search(Request $request)
    {
        $searchInternships = Internships::where('internship_title', 'like', '%' . $request->search . '%')->paginate(10);
        if ($request->ajax()) {
            return view('content.internships.table', ['internships' => $searchInternships])->render();
        } else {
            return view('content.internships.list', ['internships' => $searchInternships]);
        }
    }
}
