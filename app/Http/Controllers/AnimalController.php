<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $animals = Animal::all();

        return view("animals.index")->with("animals", $animals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return response()->json(["data" => __METHOD__], 200); //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $animal = Animal::create([
            'name' => $request->name,
            'parody' => $request->parody,
            'age' => $request->age,
            'voice' => $request->voice,
            // 'api_token' => $data["api_token"],
        ]);

        return response()->json(["response" => $animal->jsonSerialize(), "REST" => "store"], 200); //
        // return response()->json(["data" => $animal], 200); //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    // public function show(Animal $animal)
    // {
    //     return response()->json(["data" => __METHOD__], 200); //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        return response()->json($animal, 200); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        Animal::find($animal->id)->update([
            'name' => $request->name,
            'parody' => $request->parody,
            'age' => $request->age,
            'voice' => $request->voice,
            // 'api_token' => $data["api_token"],
        ]);

        $updatedAnimal = Animal::find($animal->id);

        return response()->json(["response" => $updatedAnimal, "REST" => "update"], 200); //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        Animal::find($animal->id)->delete();
        return response()->json(["data" => $animal], 200); //
    }
}
