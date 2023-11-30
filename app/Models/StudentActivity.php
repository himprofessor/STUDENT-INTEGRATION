<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
    ];

    public static function store($request, $id = null)
    {
        if ($id) {
            $validatedData = $request->validate(
                [
                    'title' => 'required|min:1|max:100',
                ],
                [
                    'title.required'   => 'Please input title',
                ]
            );
        } else {
            $validatedData = $request->validate(
                [
                    'image' => 'required|min:1|max:6',
                    'title' => 'required|min:1|max:100',
                ],
                [
                    'image.required'   => 'Please upload photos',
                    'title.required'   => 'Please input title',
                ]
            );
        }
        $data = $request->only(
            'title',
            'description',
        );

        if ($id) {
            $existingStudentActivity = self::find($id);
            $existingStudentActivity->update($data);
            $data = $existingStudentActivity;
        } else {
            $newStudentActivity = self::create($data);
            $data = $newStudentActivity;
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
        return $this->belongsToMany(Media::class, 'student_activity_media');
    }
}