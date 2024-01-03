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
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function store($request, $id = null)
{
    // Validation rules and messages for both update and create operations
    $rules = [
      'username' => 'required|min:1|max:50',
      'email' => 'required|email|unique:users,email,' . $id,
      'password' => $id ? 'nullable|min:8' : 'required|min:8', // Make password field nullable for updates
  ];

  $messages = [
      'username.required' => 'Please enter the username',
      'email.required' => 'Please enter your email',
      'password.required' => 'Please enter your password',
      'password.min' => 'Password must be 8 characters long',
  ];


    // Validation rules and messages specific to the create operation
    if (!$id) {
        $rules['image'] = 'required|image'; // Assuming image field is required for create
        $messages['image.required'] = 'Please upload an image';
    }

    // Validate the request data
    $validatedData = $request->validate($rules, $messages);

    // Prepare user data
    $user = $request->only('username', 'email');

    // Update password only if it is present in the request
    if ($request->filled('password')) {
        $user['password'] = Hash::make($request->password);
    }

    if ($id) {
        $media_id = self::find($id)->media_id;
        if ($request->hasFile('image')) {
            $media = Media::croppImage($request, $media_id);
            $user['media_id'] = $media_id;
        }

        $existingUser = self::find($id);
        $existingUser->update($user);
        $user = $existingUser;
    } else {
        if ($request->hasFile('image')) {
            $media = Media::croppImage($request);
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

    public function studentActivities()
    {
        return $this->hasMany(StudentActivity::class);
    }
}
