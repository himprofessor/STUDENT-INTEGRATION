<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name',
        'course_description',
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
                    'course_name' => 'required',
                    'course_description' => 'required',
                ],
                [
                    'course_name.required' => 'Please input course name',
                    'course_description.required' => 'Please type description',
                ]
            );
        } else {
            $validatedData = $request->validate(
                [
                    'course_name' => 'required',
                    'course_description' => 'required',
                ],
                [
                    'course_name.required' => 'Please input course name',
                    'course_description.required' => 'Please type description',
                ]
            );
        }
        $data = $request->only([
            'course_name',
            'course_description',
        ]);
        $course = self::updateOrCreate(['id' => $id], $data);
        return $course;
    }

    public function subject(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}