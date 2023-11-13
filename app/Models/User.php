<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'username',
    'email',
    'password',
    'media_id',
  ];
  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    // 'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $users = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  public static function store($request, $id = null)
  {
    if ($id) {
      $validatedData = $request->validate(
        [
          'username' => 'required',
          'email' => 'required|email|unique:users,email,'. $id,
          'password' => 'required|min:8',
        ],
        [
          'username.required' => '*Please enter the  username',
          'email.required' => '*Please enter your email',
          'password.required' => '*Please enter your password',
        ]
      );
    } else {
      $validatedData = $request->validate(
        [
          'username' => 'required',
          'email' => 'required|email|unique:users,email,'. $id,
          'password' => 'required|min:8',
          'image' => 'required',
        ],
        [
          'username.required' => 'Please enter the  username',
          'email.required' => 'Please enter your email',
          'password.required' => 'Please enter your password',
          'image.required' => 'Please upload your image',
        ]
      );
    }

    $user = $request->only(
      'username',
      'email',
      'password',
    );
    $user['password'] = Hash::make($request->password);

    if ($id) {
      $media_id = self::find($id)->media_id;
      if ($request->hasFile('image')) {
        $media = Media::store($request, $media_id);
        $user['media_id'] = $media_id;
      }
      $existingUser = self::find($id);
      $existingUser->update($user);
      $user = $existingUser;
    }
    else {
      if ($request->hasFile('image')) {
        $media = Media::store($request);
        $user['media_id'] = $media->id;
        $user['image'] = $media->image;
      }
      $user = self::create($user);
    }
    return $user;
  }

  public function media(): HasOne
  {
    return $this->hasOne(Media::class, 'id', 'media_id');
  }
}
