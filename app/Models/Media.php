<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['image'];
    public static function store($request, $id = null)
    {
        $data = $request->validate([
            'image' => 'required|image',
        ]);
        $imagePath = $request->file('image')->store('public/assets/img/images');
        $data['image'] = str_replace('public/', '', $imagePath);

        if ($id) {
            return self::where('id',$id)->update($data);
        } else {
            return self::create($data);
        }
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'media_id', 'id');
    }

    public function department(): HasOne
    {
        return $this->hasOne(Department::class, 'media_id', 'id');
    }
}