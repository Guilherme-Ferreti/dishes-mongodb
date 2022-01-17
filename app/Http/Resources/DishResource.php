<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'price'     => $this->price,
            'country'   => $this->whenLoaded('country', fn () => [
                'id'    => $this->country->id,
                'name'  => $this->country->name,
            ]),
        ];
    }
}
