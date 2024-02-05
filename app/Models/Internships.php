<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internships extends Model
{
    use HasFactory;
    protected $fillable = [
        'internship_title',
        'internship_description',
    ];
    // get list api 
    public static function list()
    {
        return self::orderBy('created_at', 'desc')->get();
    }
    public static function store($request, $id = null)
    {
        if ($id) {
            $validatedData = $request->validate(
                [
                    'internship_title' => 'required|min:1',
                    'internship_description' => 'required|min:1',
                ],
                [
                    'internship_title.required' => 'Please input title',
                    'internship_description.required' => 'Please input description',
                ]
            );
        } else {
            $validatedData = $request->validate(
                [
                    'image'   => 'required|array|min:5|max:9',
                    'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
                    'internship_title'   => 'required|min:1',
                    'internship_description'   => 'required|min:1',
                ],
                [
                    'image.required'=> 'Please upload image at least five images',
                    'image.max' => 'This image must not be more than 9 images',
                    'internship_title'=> 'Please input title',
                    'internship_description' => 'Please input description here',
                ]
            );
        }
        $data = $request->only(
            'internship_title', 
            'internship_description',
        );
        if ($id) {
            $existingInternship = self::find($id);
            $existingInternship->update($data);
            $data = $existingInternship;
        } else {
            $newInternship = self::create($data);
            $data = $newInternship;
        }
        if (request()->image) {
            // pluck and toArray are methods used to retrieve specific value
            $existingMediaIds = $data->media()->pluck('id')->toArray();
            $mediaIds = Media::multipleImage($request, $existingMediaIds);
            $data->media()->sync($mediaIds);
        }
        return $data;
    }

    public function media()
    {
        return $this->belongsToMany(Media::class, 'internships_media');
    }
}