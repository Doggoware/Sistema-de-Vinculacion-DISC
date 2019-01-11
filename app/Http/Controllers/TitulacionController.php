<?php

namespace App\Http\Controllers;

use App\Titulacion;
use Illuminate\Http\Request;

class TitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function show(Titulacion $titulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulacion=titulacion::find($id);
        return view('titulacion.edit',compact('titulacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        titulacion::find($id)->update($request->all());
        return redirect()->route('titulacion.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Titulacions::find($id)->delete();
        return redirect()->route('titulacion.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
