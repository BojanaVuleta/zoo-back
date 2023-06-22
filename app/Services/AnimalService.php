<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalService

{
    public function showAnimals()
    {
        return Animal::all();
    }

    public function showAnimal($id)
    {
        return Animal::findOrFail($id);
    }

    public function postAnimal($request)
    {
        
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'habitat' => 'required',
            'rare' => 'required',
            'count_in_zoo' => 'required',
            'favorite_food' => 'required'
        ]);

        $animal = new Animal();

        $animal->name = $request->name;
        $animal->type = $request->type;
        $animal->habitat = $request->habitat;
        $animal->rare = $request->rare;
        $animal->count_in_zoo = $request->count_in_zoo;
        $animal->favorite_food = $request->favorite_food;
        $animal->save();

        return $animal;
    }

    public function editMovie(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'habitat' => 'required',
            'rare' => 'required',
            'count_in_zoo' => 'required',
            'favorite_food' => 'required'
        ]);

        $animal = Animal::find($id);
        $animal->name = $request->name;
        $animal->type = $request->type;
        $animal->habitat = $request->habitat;
        $animal->rare = $request->rare;
        $animal->count_in_zoo = $request->count_in_zoo;
        $animal->favorite_food = $request->favorite_food;
        $animal->save();

        return $animal;
    
    }

    public function deleteAnimal($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return $animal;
    }
}