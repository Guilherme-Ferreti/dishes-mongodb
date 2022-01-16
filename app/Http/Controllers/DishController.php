<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        return Dish::all();
    }

    public function show(Dish $dish)
    {
        return $dish;
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'      => ['required', 'string', 'max:255', 'unique:dishes'],
            'price'     => ['required', 'numeric', 'min:0.01'],
            'country'   => ['required', 'string', 'max:255'],
        ]);

        return Dish::create($attributes);
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
