<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StudentActivity extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'created_by_id',
    ];

    public static function list(){
      return self::orderBy('created_at', 'desc')->get();
    }
    public static function store($request, $id = null)
    {
        if ($id) {
            $validatedData = $request->validate(
                [
                    'image'   => 'array|min:1|max:5',
                    'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
                    'title' => 'required|min:1|max:100',
                ],
                [
                    'image.required' => 'Please upload at least one image',
                    'image.max'      => 'This image must not be more than 5 images',
                    'title'          => 'Please input title',
                ]
            );
        } else {
            $validatedData = $request->validate(
                [
                    'image'   => 'required|array|min:1|max:5',
                    'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
                    'title'   => 'required|min:1|max:100',
                ],
                [
                    'image.required' => 'Please upload at least one image',
                    'image.max'      => 'This image must not be more than 5 images',
                    'title'          => 'Please input title',
                ]
            );
        }
        $data = $request->only(
            'title',
            'description',
            'created_by_id',
        );
        $data['created_by_id'] = Auth::user()->id;
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
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by_id','id');
    }
}