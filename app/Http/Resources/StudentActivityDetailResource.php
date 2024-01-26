<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentActivityDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $images = [];
        foreach ($this->media as $media_img) {
            if ($media_img->image) {
                $images[] = asset('storage/' . $media_img->image);
            }
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => html_entity_decode(strip_tags($this->description)),
            'images' => $images,
            'created_by' => $this->user->username ?? null,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d'),
        ];
    }
}
