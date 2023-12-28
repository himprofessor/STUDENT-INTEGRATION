<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideshowResource extends JsonResource
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
            'heading' => $this->heading,
            'description' => html_entity_decode(strip_tags($this->description)),
            'image' => $this->media->image
              ? asset('storage/' . $this->media->image)
              : null,
            'media_id' => $this->media_id,
        ];
    }
}
