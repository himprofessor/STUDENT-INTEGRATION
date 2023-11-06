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
    public static function store($request, $id = null)
    {
        $department = $request->only(
            'department_name',
        );

        if ($request->hasFile('department_cover')) {
            $imagePath = $request->file('department_cover')->store('public/assets/img/imges');

            $department['department_cover'] = str_replace('public/', '', $imagePath);
        }
     
        if ($id) {
            // If $id is provided, it's an update operation
            self::where('id', $id)->update($department);
        } else {
            // If $id is null, it's an insert (create) operation
            $department = self::create($department);
        }

        return $department;
    }
}
