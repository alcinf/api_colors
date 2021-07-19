<?php

namespace App\Http\Controllers;

use App\Models\Colores;
use Illuminate\Http\Request;

class ColoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Colores::all();
        return $colors;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = Colores::create($request->all());
        return $color;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colores  $colores
     * @return \Illuminate\Http\Response
     */
    public function show(Colores $colores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colores  $colores
     * @return \Illuminate\Http\Response
     */
    public function edit(Colores $colores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colores  $colores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colores $colores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colores  $colores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colores $colores)
    {
        //
    }
}
