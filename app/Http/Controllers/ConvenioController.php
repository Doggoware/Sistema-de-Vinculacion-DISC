<?php

namespace App\Http\Controllers;

use App\Convenio;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convenios = Convenio::all();
        return view('convenios.index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('convenios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $convenios = request()->validate([
            'nombre_empresa' => 'required',
            'tipo_convenio' => 'required',
            'fecha_inicio' => 'required|before:today',
            'fecha_termino' => 'required|after_or_equal:fecha_inicio',
            'evidencia' => 'required',
        ], [
            'nombre_empresa.required' => 'El campo nombre es obligatorio',
            'tipo_convenio.required' => 'El campo convenio es obligatorio',
            'fecha_inicio.required' => 'El campo fecha de inicio es obligatorio',
            'fecha_termino.required' => 'El campo fecha de termino es obligatorio',
            'evidencia.required' => 'Debe subir un archivo .pdf',
        ]);

        // cache the file
        $file = $request->file('evidencia');

        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'evidencia-' . time() . '.' . $file->getClientOriginalExtension();

        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('photos', $filename);

        $ext = Convenio::create([
            'nombre_empresa' => $convenios['nombre_empresa'],
            'tipo_convenio' => $convenios['tipo_convenio'],
            'fecha_inicio' => $convenios['fecha_inicio'],
            'fecha_termino' => $convenios['fecha_termino'],
            'evidencia' => $convenios['evidencia']
        ]);
        $ext -> save();
        return redirect()->route('convenio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convenio $convenio)
    {
        //
    }
}
