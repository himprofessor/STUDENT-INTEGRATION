<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
    ];

    public static function store($request, $id = null)
    {
        $data = $request->only(
            'title',
            'description',
        );
        
        $data = self::updateOrCreate(['id' => $id], $data);

        return $data;
    }
}
