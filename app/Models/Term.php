<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Term extends Model
{
  use HasFactory;
  protected $fillable = [
    'term_name',
  ];
  // get list api 
  public static function list()
  {
    return self::orderBy('created_at', 'desc')->get();
  }
  public static function store($request, $id = null)
  {
    $data = $request->only([
      'term_name',
    ]);
    $data = self::updateOrCreate(['id' => $id], $data);
    return $data;
  }

  public function subject(): HasMany
  {
    return $this->hasMany(Subject::class);
  }
}