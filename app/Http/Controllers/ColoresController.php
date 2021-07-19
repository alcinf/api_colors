<?php

namespace App\Http\Controllers;

use App\Models\Colores;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ColoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Colores::paginate(6);
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
        return $colores;
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
        $data = array();
        if( $request->filled('name') )
            $data['name'] = $request->name;
        if( $request->filled('color') )
            $data['color'] = $request->color;
        if( $request->filled('pantone') )
            $data['pantone'] = $request->pantone;
        if( $request->filled('year') )
            $data['year'] = $request->year;
        //print_r($data); exit;
        if ( empty( $data ) ) {
            return response()->json([
                'status' => Response::HTTP_BAD_REQUEST,
                'message' => 'No data',
            ], Response::HTTP_BAD_REQUEST);
        }
        $colores->update($data);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Record updated',
            'data' => $colores,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colores  $colores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colores $colores)
    {
        $colores->delete();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Record deleted',
            'data' => $colores,
        ], Response::HTTP_OK);
    }
}
