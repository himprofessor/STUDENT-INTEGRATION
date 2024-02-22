<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $fillable = ['file', 'original_name_file'];

    // get api list
    public static function list()
    {
        return self::orderBy('created_at', 'desc')->get();
    }

    public function upload($request, $id)
    {
        if ($id) {
            $validatedData = $request->validate(
                ['file' => 'required|file|mimes:pdf'],
                ['file.required' => 'Please upload a PDF file.'],
                ['file.mimes' => 'Only PDF files are allowed.'],
            );
        } else {
            $validatedData = $request->validate(
                ['file' => 'required|file|mimes:pdf'],
                ['file.required' => 'Please upload a PDF file.'],
                ['file.mimes' => 'Only PDF files are allowed.'],
            );
        }

        $file = $request->file('file');
        if ($file) {
            // get original file name 
            $originalFileName = $file->getClientOriginalName();

            // Store the file in the storage directory
            $path = $file->store('public/assets/pdf'); 
            $pdf = str_replace('public/', '', $path);

            if (!empty($files)) {
                self::where('id', $files)->update(['file' => $pdf]);
                $fileID = $files;
            } else {
                $rule = self::create(['file' => $pdf,'original_name_file'=>$originalFileName]);
                $fileID = $rule->id;
            }
            return $fileID;  // return createOrupdate id
        }
    }
}