<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
    use HasFactory;
    protected $fillable = [
        'data',
        'description',
    ];
    
      // get api
    public static function list(){
        return self::orderBy('created_at', 'desc')->get();
    }

    public static function store($request, $id = null)
    {
        //Condition validate edit
        if ($id) {
            $validatedData = $request->validate([

                'data' => 'required',
            ], [
                'data.required' => '* Please enter the impact data',
            ]);
        } else {
            $validatedData = $request->validate([

                'data' => 'required',
                'description' => 'nullable',
            ], [
                'data.required' => 'Please enter the impact data',
            ]);
        }
        $data = $request->only([
            'data',
            'description',
        ]);
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
