<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'term_id',
        'course_id',
        'subject_name',
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
                    'term_id' => 'required',
                    'course_id' => 'required',
                    'subject_name' => 'required',
                ],
                [
                    'term_id.required' => 'Please select term name',
                    'course_id.required' => 'Please select course name',
                    'subject_name.required' => 'Please input subject name',
                ]
            );
        } else {
            $validatedData = $request->validate(
                [
                    'term_id' => 'required',
                    'course_id' => 'required',
                    'subject_name' => 'required',
                ],
                [
                    'term_id.required' => 'Please select term name',
                    'course_id.required' => 'Please select course name',
                    'subject_name.required' => 'Please input subject name',
                ]
            );
        }
        $data = $request->only([
            'term_id',
            'course_id',
            'subject_name',
        ]);
        $subject = self::updateOrCreate(['id' => $id], $data);
        return $subject;
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class, 'term_id', 'id');
    }
}