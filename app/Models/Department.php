<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_name',
        'department_cover',
    ];

    public static function store($request, $id = null)
    {
        $data = $request->only(
            'department_name',
            'department_cover',
        );

        $data = self::updateOrCreate(['id' => $id], $data);

        return $data;
    }
}
