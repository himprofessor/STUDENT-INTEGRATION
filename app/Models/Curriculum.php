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

  public static function store($request, $id = null)
  {
      $rules = [
          'image' => 'nullable|image|mimes:jpeg,png,gif|max:20000',
          'title' => 'nullable', // Make 'title' optional
      ];
      $messages = [
          'image.mimes' => 'Only JPEG, PNG, and GIF images are allowed',
      ];

      // Remove the 'required' message for 'title'
      unset($messages['title.required']);

      $validated = $request->validate($rules, $messages);

      $data = $request->only('title', 'description');

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
