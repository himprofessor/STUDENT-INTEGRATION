<?php

namespace App\Http\Controllers\Slideshow;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlideshowController extends Controller
{
    public function index()
    {
        $slideshows = Slideshow::orderBy('created_at', 'desc')->with('media')->paginate(3);

        $totalSlideshows = Slideshow::count();

        return view('content.slideshow.list', compact('slideshows', 'totalSlideshows'));
    }


    public function create()
    {
        $media = Media::all();
        return view('content.slideshow.create', compact('media'));
    }

    // Function Search

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $slideshows = Slideshow::where(function ($query) use ($searchTerm) {
            $query->where('heading', 'like', "%$searchTerm%")
                ->orWhere('description', 'like', "%$searchTerm%");
        })->paginate(10);

        return view('content.slideshow.list', compact('slideshows'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        Slideshow::store($request);

        DB::commit();
        return redirect('slideshow')->with('success', 'Slideshow has been created successfully.');
    }

    public function edit($id)
    {
        $slideshow = Slideshow::findOrFail($id);
        return view('content.slideshow.edit', compact('slideshow'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        Slideshow::store($request, $id);

        DB::commit();

        // Redirect back to the slideshow list or a success page
        return redirect()->route('slideshow', $id)->with('success', 'Slideshow has been updated successfully.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        // Find the slideshow by its ID and delete it
        $slideshow = Slideshow::find($id);

        if ($slideshow->media) {
            $slideshow->media->delete();
        }
        DB::commit();

        // Redirect back to the slideshow list or a success page
        return redirect()->route('slideshow')->with('success', 'Slideshow has been deleted successfully.');
    }
}
