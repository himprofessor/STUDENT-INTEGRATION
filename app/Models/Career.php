<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
      'title',
      'description',
      'media_id',
    ] ;
    public static function list(){
      return self::orderBy('created_at', 'desc')->get();
    }
    public static function store($request, $id = null)
    {
      if ($id) {
      $validatedData = $request->validate(
          [
              'title' => 'required',
          ],
          [
              'title.required' => 'Please input title',
          ]
      );
  } else {
      $validatedData = $request->validate(
          [
              'title' => 'required',
              'image'=> 'required',
          ],
          [
              'title.required' => 'Please input title',
              'image.required' => 'Please upload image',
          ]
      );
  }

  $data = $request->only(
      'title',
      'description',
  );
  if ($id) {
      $media_id = self::find($id)->media_id;
      if ($request->hasFile('image')) {
          $media = Media::croppImage($request, $media_id);
          $data['media_id'] = $media_id;
      }
      $existingCareer = self::find($id);
      $existingCareer->update($data);
      $data = $existingCareer;
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
