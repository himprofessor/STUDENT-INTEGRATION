<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  public function index()
  {
      $users = User::orderBy('created_at', 'desc')->paginate(10);
      return view('content.user.list', compact('users'));
  }

  public function create()
  {
    return view('content.user.create');
  }

  public function store(Request $request)
  {
    DB::beginTransaction();

    User::store($request);

    DB::commit();
    $user = new User();
    $user->username=$request->input('username');
    $user->email=$request->input('email');
    $user->password=$request->input('password');
    $user->image=$request->input('image');

    return redirect('/user');

  }
  public function show(User $user)
  {

      return view('show',compact('user'));
  }
  public function edit($id)
    {
        $user = User::find($id);
        return view('content.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $user = $request->only('username','email', 'password','image');
        $users->update($user);
        return redirect('/user');
    }

  public function destroy($id)
    {
        DB::beginTransaction();

        // Find the User by its ID and delete it
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        DB::commit();

        // Redirect back to the User list or a success page
        return redirect('/user');
    }
}
