<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Curriculum extends Model
{
  use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'media_id',
    ];
  // get api
    public static function list(){
        return self::orderBy('created_at', 'desc')->get();
    }

    public static function store($request, $id = null)
    {
        //Condition validate edit
        if ($id) {
            $validatedData = $request->validate([

                'title' => 'required',
                'description' => 'required',
            ], [
                'title.required' => '* Please enter the title',
                'description.required' => '* Please enter the description',
            ]);
        } else {
            $validatedData = $request->validate([
                'title'   => 'required|min:1|max:100',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,gif|max:2000',
            ], [
                'title.required' => 'Please input the curriculum title',
                'description.required' => 'Please input the curriculum description',
                'image.required' => 'Please choose a curriculum image',
            ]);         
        }   
        $data = $request->only('title', 'description');

        if ($id) {
            $media_id = self::find($id)->media_id;
            if ($request->hasFile('image')) {
                $media = Media::croppImage($request, $media_id);
                $data['media_id'] = $media_id;
            }
            $existingUser = self::find($id);
            $existingUser->update($data);
            $data = $existingUser;
        } else {
            if ($request->hasFile('image')) {
                $media = Media::croppImage($request);
                $data['media_id'] = $media->id;
                $data['image'] = $media->image;
            }
            $data = self::create($data);
        }
        return $data;
    }

    public function media(): HasOne
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }
}
