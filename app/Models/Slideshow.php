<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Slideshow extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'description',
        'media_id',
    ];

    public static function store($request, $id = null)
    {
        if ($id) {
            $validated = $request->validate(
                [
                    'heading' => 'required',
                ],
                [
                    'heading.required' => '* Please enter the heading',
                ]
            );
        } else {
            $validated = $request->validate(
                [
                    'heading' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,gif|max:800',
                ],
                [
                    'heading.required' => 'Please enter the heading',
                    'image.required' => 'Please choose a slideshow image',
                    'image.mimes' => 'Only JPEG, PNG, and GIF images are allowed',
                ]
            );
        }

        $data = $request->only('heading', 'description');

        if ($id) {
            $media_id = self::find($id)->media_id;
            if ($request->hasFile('image')) {
                $media = Media::store($request, $media_id);
                $data['media_id'] = $media_id;
            }
            $existingSlideshow = self::find($id);
            $existingSlideshow->update($data);
            $data = $existingSlideshow;
        } else {
            if ($request->hasFile('image')) {
                $media = Media::store($request);
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
