<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_name',
        'media_id',
    ];

    public static function store($request, $id = null)
    {
        //Condition validate edit
        if ($id) {
            $validatedData = $request->validate([

                'department_name' => 'required',
            ], [
                'department_name.required' => '* Please enter the department name',
            ]);
        } else {
            $validatedData = $request->validate([

                'department_name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,gif|max:2000',
            ], [
                'department_name.required' => 'Please enter the department name',
                'image.required' => 'Please choose a department cover image',
            ]);
        }
        $department = $request->only('department_name');

        if ($id) {
            $media_id = self::find($id)->media_id;
            if ($request->hasFile('image')) {
                $media = Media::store($request, $media_id);
                $department['media_id'] = $media_id;
            }
            $existingUser = self::find($id);
            $existingUser->update($department);
            $department = $existingUser;
        } else {
            if ($request->hasFile('image')) {
                $media = Media::store($request);
                $department['media_id'] = $media->id;
                $department['image'] = $media->image;
            }
            $department = self::create($department);
        }
        return $department;
    }

    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }
    public function media(): HasOne
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }
}