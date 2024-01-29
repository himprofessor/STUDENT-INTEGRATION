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
    public static function list(){
        return self::orderBy('created_at', 'desc')->get();
      }
    public static function store($request, $id = null)
    {
        // Condition validate edit
        if ($id) {
            $validatedData = $request->validate([
                'heading' => 'nullable', // Make 'heading' optional for editing
            ]);
        } else {
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,gif|max:2000',
                'heading' => 'nullable', // Make 'heading' optional for creation
            ], [
                'image.required' => 'Please choose a curriculum image',
            ]);
        }
        $data = $request->only('heading', 'description');   
        if ($id) {
            $media_id = self::find($id)->media_id;
            if ($request->hasFile('image')) {
                $media = Media::store($request, $media_id);
                $data['media_id'] = $media_id;
            }
            $existingUser = self::find($id);
            $existingUser->update($data);
            $data = $existingUser;
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
