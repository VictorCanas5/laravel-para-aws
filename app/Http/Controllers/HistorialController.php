<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial;
class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historial= Historial::all();

        return $historial;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $historial = new Historial();
        $historial->fecha_inicio=$request->fecha_inicio;
        $historial->fecha_final=$request->fecha_final;
        $historial->hora_inicio=$request->hora_inicio;
         $historial->hora_final=$request->hora_final;
          $historial->estado=$request->estado;
           $historial->descripcion=$request->descripcion;
           $historial->sensor_id=$request->sensor_id;

        $historial->save();
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
    public function update(Request $request, $id)
    {
        $historial= Historial::findOrFail($request->id);
       $historial->fecha_inicio=$request->fecha_inicio;
        $historial->fecha_final=$request->fecha_final;
        $historial->hora_inicio=$request->hora_inicio;
         $historial->hora_final=$request->hora_final;
          $historial->estado=$request->estado;
           $historial->descripcion=$request->descripcion;

        $historial->save();
         return $historial;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $historial=  Historial::destroy($id);
        return $historial;
    }
}
