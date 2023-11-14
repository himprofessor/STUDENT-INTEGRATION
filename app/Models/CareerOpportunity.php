<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerOpportunity extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'job_description',
    ];

    public static function store($request, $id = null)
    {
        if ($id) {
            $validate = $request->validate(
                [
                    'job_title'       => 'required|min:1',
                    'job_description' => 'required|min:1',
                ],
                [
                    'job_title.required'       => 'Please enter a job title',
                    'job_description.required' => 'Please enter your text here',
                ]
            );
        } else {
            $validate = $request->validate(
                [
                    'job_title'       => 'required|min:1|unique:career_opportunities',
                    'job_description' => 'required|min:1',
                ],
                [
                    'job_title.required'       => 'Please enter a job title',
                    'job_title.unique'         => 'Job title already taken',
                    'job_description.required' => 'Please enter your text here',
                ]
            );
        }

        $data = $request->only(
            'job_title',
            'job_description',
        );
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}