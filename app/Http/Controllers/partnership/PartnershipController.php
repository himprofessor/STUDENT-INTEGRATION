<?php

namespace App\Http\Controllers\partnership;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Partnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnershipController extends Controller
{
    public function index(){
        $partnerships = Partnership::orderBy('created_at', 'desc')->with('media')->paginate(10);
        return view('content.partnership.list', compact('partnerships'));
    }

    public function create()
    {
        $media = Media::all();
        $partnership = new Partnership();
        return view('content.partnership.create', compact('partnership', 'media'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        Partnership::store($request);
        DB::commit();
        return redirect('partnership')->with('success', 'Partnership has been created successfully.');
    }

    public function edit($id)
    {
        $partnership = Partnership::findOrFail($id);
        return view('content.partnership.edit', compact('partnership'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        Partnership::store($request, $id);
        DB::commit();
        // Redirect back to the partnership list or a success page
        return redirect('partnership')->with('success', 'Partnership has been updated successfully.');
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        // Find the partnership by its ID and delete it
        $partnership = Partnership::find($id);
        if ($partnership->media) {
            $partnership->media->delete();
        }
        DB::commit();

        // Redirect back to the partnership list or a success page
        return redirect('partnership')->with('success', 'Partnership has been deleted successfully.');
    }
    public function search(Request $request)
    {
        $searchPartnership = Partnership::where('partnership_name', 'like', '%' . $request->search . '%')
            ->paginate(10);
        if ($request->ajax()) {
            return view('content.partnership.table', ['partnerships' => $searchPartnership])->render();
        } else {
            return view('content.partnership.list', ['partnerships' => $searchPartnership]);
        }
    }
}
