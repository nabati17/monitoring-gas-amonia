<?php

namespace App\Http\Controllers;

use App\Models\GasLevel;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGasLevelRequest;
use App\Http\Requests\UpdateGasLevelRequest;
use Illuminate\Support\Facades\View;

class GasLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        // Fetch gas levels from the database
        $gasLevels = GasLevel::all();

        // Pass the data to the view
        return view('dashboard', ['gasLevels' => $gasLevels]);
    }

    public function getGasLevelsApi()
    {
        // Fetch gas levels from the database
        $gasLevels = GasLevel::all();

        // Return the gas levels as JSON
        return response()->json(['gasLevels' => $gasLevels]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGasLevelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GasLevel $gasLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GasLevel $gasLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGasLevelRequest $request, GasLevel $gasLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GasLevel $gasLevel)
    {
        //
    }
}
