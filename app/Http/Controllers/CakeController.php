<?php

namespace App\Http\Controllers;

use App\Http\Resources\CakeResource;
use App\Models\Cake;
use Illuminate\Http\Request;

class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CakeResource::collection(Cake::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:cakes|max:255',
            'weight' => 'required|integer',
            'value' => 'required|',
            'amount' => 'required|integer'
        ]);

        $cake = Cake::create($validated);

        return response()->json($cake);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cake $cake)
    {
        return response()->json($cake);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cake $cake)
    {
        $cake->update($request->only([
            'name',
            'weight',
            'value',
            'amount'
        ]));

        return response()->json($cake);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cake $cake)
    {
        $cake->delete();

        return response()->json(null, 204);
    }
}
