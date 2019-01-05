<?php

namespace App\Http\Controllers;

use App\extension;
use Illuminate\Http\Request;

class ExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extension = extension::all();
        return view('extension.index', compact('extension'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('extension.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension =  request()->validate([
            'titulo' => 'required',
            'nombre' => ['required','regex:/(^([a-z|A-Z]+)$)/'],
            'lugar' => ['required','regex:/(^([a-z|A-Z]+)$)/'],
            'fecha' => 'required|before:today',
            'cantidad' => 'required|integer|min:0',
            'organizador' => ['required','regex:/(^([a-z|A-Z]+)$)/'],
            'tipo_convenio' => '',
            'evidencia' => 'required',
        ], [
            'titulo.required' => 'El campo título de actividad es obligatorio',
            'nombre.required' => 'El campo nombre del expositor es obligatorio',
            'lugar.required' => 'El campo lugar es obligatorio',
            'fecha.required' => 'El campo fecha es obligatorio',
            'cantidad.required' => 'El campo cantidad de estudiantes es obligatario',
            'organizador.required' => 'El campo organizador es obligatorio',
            'evidencia.required' => 'Debe subir evidencia de la actividad'
        ]);

        $photos = $request->file('evidencia');
        $paths  = [];
        foreach ($photos as $photo) {
            $ext = $photo->getClientOriginalExtension();
            $filename  = 'profile-photo-' . time() . '.' . $ext;
            $paths[]   = $photo->storeAs('photos', $filename);
        }
        $ext = extension::create([
            'titulo' => $extension['titulo'],
            'nombre' => $extension['nombre'],
            'fecha' => $extension['fecha'],
            'lugar' => $extension['lugar'],
            'cantidad' => $extension['cantidad'],
            'organizador' => $extension['organizador'],
            'tipo_convenio' => $extension['tipo_convenio'],
            'evidencia' => $extension['evidencia']
        ]);
        return redirect()->route('extension.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function show(extension $extension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function edit(extension $extension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, extension $extension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function destroy(extension $extension)
    {
        //
    }
}
