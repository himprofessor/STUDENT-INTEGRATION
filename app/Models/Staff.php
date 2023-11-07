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
                'profile' => 'required|mimes:jpeg,png,gif|max:800',
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
                'profile.required' => 'Please upload profile',
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