<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function index()
  {
    $users = User::orderBy('created_at', 'desc')->with('media')->paginate(2);
    return view('content.user.list', compact('users'));
  }

  public function create()
  {
    $media = Media::all();
    return view('content.user.create', compact('media'));
  }

  public function store(Request $request)
  {
    DB::beginTransaction();
    User::store($request);
    DB::commit();
    return redirect('/user');
  }
  public function show(User $user)
  {
    return view('show', compact('user'));
  }
  public function edit($id)
  {
    $user = User::find($id);
    $media = $user->media; // Get the associated media for the user
    return view('content.user.edit', compact('user', 'media'));
  }

  public function update(Request $request, $id)
  {
    DB::beginTransaction();
    User::store($request, $id);
    DB::commit();
    return redirect('/user');
  }

  public function destroy($id)
  {
    DB::beginTransaction();
    // Find user and media by id and delete it 
    $user = User::find($id);
    if ($user->media) {
      $user->media->delete();
    }
    DB::commit();
    // Redirect back to the User list or a success page
    return redirect('/user');
  }

  public function search(Request $request)
  {
    // Your search logic here
    $username = $request->input('username');

    // Assuming you have a method to search users based on the username
    $users = User::where('username', 'like', "%$username%")->paginate(10);

    return view('content.user.list', ['users' => $users]);
  }
}
