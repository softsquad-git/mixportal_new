<?php

namespace App\Http\Resources;

use App\Services\Adverts\AdvertService;
use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ad' => [
                'id' => $this->ad->id
            ],
            'image' => asset($this->ad->getImage()),
            'created_at' => (string)$this->created_at,
            'title' => $this->title
        ];
    }
}
