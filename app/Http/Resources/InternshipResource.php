<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InternshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $images = $this->media->pluck('image')->map(function ($image) {
            return asset('storage/' . $image);
        })->toArray();
        return [
            'id' => $this->id,
            'internship_title' => $this->internship_title,
            'internship_description' => $this->internship_description,
            'images' => $images,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d'),
        ];
    }
}
