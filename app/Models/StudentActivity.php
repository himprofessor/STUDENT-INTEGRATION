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

        if ($request->hasFile('image')) {
            $mediaIds = Media::multiple($request);
            $data->media()->sync($mediaIds);
        }

        return $data;
    }

    public function media()
    {
        return $this->belongsToMany(Media::class, 'student_activity_media');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
