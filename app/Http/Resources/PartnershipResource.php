<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnershipResource extends JsonResource
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
            'media_id' => $this->media->image ? asset('storage/' . $this->media->image) : null,
            'partnership_name' => $this->partnership_name,
            'address' => $this->address,
            'website' => $this->website,
        ];
    }
}




