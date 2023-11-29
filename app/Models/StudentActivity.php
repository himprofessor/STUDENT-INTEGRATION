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
        'user_id',
    ];

    public static function store($request, $id = null)
    {
        if ($id) {
            $validatedData = $request->validate(
                [
                    // 'image' => 'required|min:1|max:6',
                    'title' => 'required|min:1|max:100',
                    'user_id' => 'required',
                ],
                [
                    // 'image.required'   => 'Photos must less than 6 itmes',
                    'title.required'   => 'Please input title',
                    'user_id.required' => 'Please select user name',
                ]
            );
        } else {
            $validatedData = $request->validate(
                [
                    'image' => 'required|min:1|max:6',
                    'title' => 'required|min:1|max:100',
                    'user_id' => 'required',
                ],
                [
                    'image.required'   => 'Please upload photos',
                    'title.required'   => 'Please input title',
                    'user_id.required' => 'Please select user name',
                ]
            );
        }
        $data = $request->only(
            'title',
            'description',
            'user_id'
        );

        if ($id) {
            $existingStudentActivity = self::find($id);
            $existingStudentActivity->update($data);
            $data = $existingStudentActivity;
        } else {
            $newStudentActivity = self::create($data);
            $data = $newStudentActivity;
        }
        
        $existingMediaIds = $data->media()->pluck('id')->toArray();
        $mediaIds = Media::multipleImage($request, $existingMediaIds);
        $data->media()->sync($mediaIds);
        
        // pluck and toArray are methods used to retrieve specific value
        // dd($data);// ID of studnet-activities
        return $data;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function media()
    {
        return $this->belongsToMany(Media::class, 'student_activity_media');
    }
}