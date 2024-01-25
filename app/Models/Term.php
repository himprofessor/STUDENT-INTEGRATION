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
  public static function store($request, $id = null)
  {
    $data = $request->only([
      'term_name',
    ]);
    $data = self::updateOrCreate(['id' => $id], $data);
    return $data;
  }
}
