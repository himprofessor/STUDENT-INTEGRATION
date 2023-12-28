<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentActivityResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'title' => $this->title,
      'description' => html_entity_decode(strip_tags($this->description)),
      'image' => $this->media[0]->image
        ? asset('storage/' . $this->media[0]->image)
        : null,
      'user' =>$this->user->username,
      'created_at' => $this->created_at->format('Y-m-d'),
      'updated_at' => $this->updated_at->format('Y-m-d'),
    ];
  }
}
