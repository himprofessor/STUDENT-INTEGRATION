<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    'image',
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
      $user = $request->only(
          'username',
          'email',
          'password',
      );
      $user['password'] = Hash::make($request->password);

      // Check if a new image file was uploaded
      if ($request->hasFile('image')) {
          $imagePath = $request->file('image')->store('public/assets/img/images');
          $user['image'] = str_replace('public/', '', $imagePath);
      }

      if ($id) {
          // If $id is provided, it's an update operation
          self::where('id', $id)->update($user);
      } else {
          // If $id is null, it's an insert (create) operation
          $user = self::create($user);
      }

      return $user;
  }

}
