<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CareerResource extends JsonResource
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
        'job_title' => $this->job_title,
        'job_description' => html_entity_decode(strip_tags($this->job_description)),
        // 'media_id' => $this->media->image ? asset('storage/' . $this->media->image) :null,
    ];
  }
}
