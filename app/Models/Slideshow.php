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
        $rules = [
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:20000',
            'heading' => 'nullable', // Make 'heading' optional
        ];
        $messages = [
            'image.mimes' => 'Only JPEG, PNG, and GIF images are allowed',
        ];

        // Remove the 'required' message for 'heading'
        unset($messages['heading.required']);

        $validated = $request->validate($rules, $messages);

        $data = $request->only('heading', 'description');

        if ($id) {
            $media_id = self::find($id)->media_id;
            if ($request->hasFile('image')) {
                $media = Media::croppImage($request, $media_id);
                $data['media_id'] = $media_id;
            }
            $existingSlideshow = self::find($id);
            $existingSlideshow->update($data);
            $data = $existingSlideshow;
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
