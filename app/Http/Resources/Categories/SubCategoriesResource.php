<?php

namespace App\Http\Resources\Categories;

use Illuminate\Http\Resources\Json\JsonResource;
use \Illuminate\Http\Request;

class SubCategoriesResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->text,
            'category' => [
                'id' => $this->category->id
            ]
        ];
    }
}
