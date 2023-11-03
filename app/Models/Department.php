<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_name',
        'department_cover',
    ];

    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class);
    }
}
