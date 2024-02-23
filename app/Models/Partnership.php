<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Partnership extends Model
{
    use HasFactory;
    protected $fillable = [
        'media_id',
        'partnership_name',
        'address',
        'website',
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

                'partnership_name' => 'required',
            ], [
                'partnership_name.required' => '* Please enter the partnership name',
            ]);
        } else {
            $validatedData = $request->validate([

                'partnership_name' => 'required',
                'address' => 'nullable',
                'website' => 'nullable',
                'image' => 'required|image|mimes:jpeg,png,gif|max:2000',
            ], [
                'partnership_name.required' => 'Please enter the partnership name',
                'image.required' => 'Please choose a partnership icon image',
            ]);
        }
        $data = $request->only('partnership_name','address','website');

        // if ($id) {
        //     $media_id = self::find($id)->media_id;
        //     if ($request->hasFile('image')) {
        //         $media = Media::croppImage($request, $media_id);
        //         $data['media_id'] = $media_id;
        //     }
        //     $existingUser = self::find($id);
        //     $existingUser->update($data);
        //     $data = $existingUser;
        // } else {
        //     if ($request->hasFile('image')) {
        //         $media = Media::croppImage($request);
        //         $data['media_id'] = $media->id;
        //         $data['image'] = $media->image;
        //     }
        //     $data = self::create($data);
        // }
        // return $data;

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