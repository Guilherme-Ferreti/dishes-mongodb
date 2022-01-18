<?php

namespace App\Http\Resources;

use App\Models\Chef;
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
            'chefs'     => $this->whenLoaded('chefs', fn () => $this->chefs->map(fn (Chef $chef) => [
                'id'        => $chef->id,
                'name'      => $chef->name,
                'country'   => $chef->country->name,
            ])),
            'ingredients' => $this->ingredients->map(fn ($ingredient) => [
                'id'        => $ingredient->id,
                'name'      => $ingredient->name,
                'optional'  => $ingredient->optional,
            ]),
        ];
    }
}
