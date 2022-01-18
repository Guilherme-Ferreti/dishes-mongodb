<?php

namespace App\Http\Controllers;

use App\Http\Resources\DishResource;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(Request $request)
    {
        $dishes = Dish::query()
            ->with('country', 'chefs.country')
            ->when($request->country, fn ($query) => 
                $query->whereHas('country', fn ($query) => $query->where('name', $request->country))
            )
            ->get();

        return DishResource::collection($dishes);
    }

    public function show(Dish $dish)
    {
        return $dish;
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'          => ['required', 'string', 'max:255', 'unique:dishes'],
            'price'         => ['required', 'numeric', 'min:0.01'],
            'country_id'    => ['required', 'string', 'exists:countries,_id'],
        ]);

        $dish = Dish::create($attributes);

        $dish->load('country');

        return $dish;
    }

    public function update(Request $request, Dish $dish)
    {
        $attributes = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'price'     => ['required', 'numeric', 'min:0.01'],
            'country'   => ['required', 'string', 'max:255'],
        ]);

        $dish->update($attributes);

        return $dish;
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();

        return response(status: 204);
    }

    public function forceDelete(Dish $dish)
    {
        $dish->forceDelete();

        return response(status: 204);
    }
}
