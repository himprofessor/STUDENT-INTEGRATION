<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
  use HasFactory;
  protected $fillable = [
    'term_name',
  ];

  public static function list(){
    return self::orderBy('created_at', 'desc')->get();
  }
  public static function store($request, $id = null)
  {
    if ($id) {
      $validatedData = $request->validate(
          [
              'term_name' => 'required',
          ],
          [
              'term_name.required' => 'Please input Name of term',
          ]
      );
  } else {
      $validatedData = $request->validate(
          [
              'term_name' => 'required',
          ],
          [
              'term_name.required' => 'Please input Term name',
          ]
      );
  }
    $term = $request->only([
      'term_name',
    ]);
    $term = Term::updateOrCreate(
      ['id' => $request->input('term_id')],
      ['term_name' => $request->input('term_name')]
  );

    return $term;
  }
}
