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

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}