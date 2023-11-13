<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'position',
        'media_id',
        'phone',
        'start_date',
        'end_date',
        'department_id',
        'about',
    ];

    public static function store($request, $id = null)
    {
        if($id){
            $validatedData = $request->validate([
                'first_name' => 'required|min:1|max:50',
                'last_name' => 'required|min:1|max:50',
                'email' => 'required|email|unique:staff,email,'. $id,
                'position' => 'required',
                'phone' => 'required|digits:10',
                'department_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'about' => 'required|min:1',
            ],
            [
                'first_name.required' => 'Please input first name',
                'last_name.required' => 'Please input last name',
                'email.required' => 'Please input email',
                'position.required' => 'Please input position',
                'phone.required' => 'Please input phone number',
                'department_id.required' => 'Please select department name',
                'start_date.required' => 'Please select start date',
                'end_date.required' => 'Please select end date',
                'about.required' => 'Please input something here',
            ]);
        }
        else{
            $validatedData = $request->validate([
                'first_name' => 'required|min:1|max:50',
                'last_name' => 'required|min:1|max:50',
                'email' => 'required|email|unique:staff,email,'. $id,
                'position' => 'required',
                'phone' => 'required|digits:10',
                'department_id' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'about' => 'required|min:1',
            ],
            [
                'first_name.required' => 'Please input first name',
                'last_name.required' => 'Please input last name',
                'email.required' => 'Please input email',
                'position.required' => 'Please input position',
                'phone.required' => 'Please input phone number',
                'department_id.required' => 'Please select department name',
                'start_date.required' => 'Please select start date',
                'end_date.required' => 'Please select end date',
                'about.required' => 'Please input something here',
            ]);
        }

        $data = $request->only(
            'first_name',
            'last_name',
            'email',
            'position',
            'phone',
            'start_date',
            'end_date',
            'department_id',
            'about',
        );
        if ($id) {
          $media_id = self::find($id)->media_id;
          if ($request->hasFile('image')) {
            $media = Media::store($request, $media_id);
            $data['media_id'] = $media_id;
          }
          $existingUser = self::find($id);
          $existingUser->update($data);
          $data = $existingUser;
        }
        else {
          if ($request->hasFile('image')) {
            $media = Media::store($request);
            $data['media_id'] = $media->id;
            $data['image'] = $media->image;
          }
          $data = self::create($data);
        }
        return $data;
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function media():HasOne
    {
        return $this->hasOne(Media::class,'id', 'media_id');
    }
}
