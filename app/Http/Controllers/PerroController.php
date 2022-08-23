<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perro;

class PerroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perros = Perro::all();
        return $perros;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // vtrybyr
        // vynrfe
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'nombre' => 'required|string|min:5',
            'raza' => 'required|string|min:5',
            'altura' => 'required|numeric'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        Perro::create($request->all());
        return response()->json(['status'=> 201,'message' => 'perro guardado'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'nombre' => 'required|string|min:5',
            'raza' => 'required|string|min:5',
            'altura' => 'required|numeric'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $perros->fill($request->all());
        $perros->save();

        return response()->json(['status'=> 201,'message' => 'perro actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perro $perros)
    {
        $perros->delete();
        return response()->json(['status'=> 200,'message' => 'perro eliminado']);
    }
}
