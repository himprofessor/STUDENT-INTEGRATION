<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'position',
        'profile',
        'phone',
        'start_date',
        'end_date',
        'department_id',
        'about',
    ];

    public static function store($request, $id = null)
    {
        $data = $request->only(
            'first_name',
            'last_name',
            'email',
            'position',
            'profile',
            'phone',
            'start_date',
            'end_date',
            'department_id',
            'about',
        );

        //Check if a new image file was uploaded
        if($request->hasFile('profile')){
            $imgPart = $request->file('profile')->store('public/assets/img/images');
            $data['profile'] = str_replace('public/', '', $imgPart );
        }
        if($id){
            // If $id is provided it's an update operation
            self::where('id', $id)->update($data);
        }else{
            // If $id is null, it's an insert create operation
            $data = self::create($data);
        }
        return $data;
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}