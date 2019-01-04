<?php

namespace App\Http\Controllers;

use App\aprendizaje;
use Illuminate\Http\Request;

class AprendizajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aprendizaje = aprendizaje::all();
        return view('aprendizajes.index', compact('aprendizaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aprendizajes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aprendizaje = request()->validate([
            'asignatura' => 'required',
            'nombre' => ['required','regex:/(^([a-z|A-Z]+)$)/'],
            'cantidad' => 'required|integer',
            'socio' => ['required','regex:/(^([a-z|A-Z]+)$)/'],
            'año' => 'required|integer|digits:4|min:0',
            'semestre' => 'required|integer|min:1|max:2',
            'evidencia' => 'required',
        ], [
            'asignatura.required' => 'El campo nombre asignatura es obligatorio',
            'nombre.required' => 'El campo nombre del profesor es obligatorio',
            'cantidad.required' => 'El campo cantidad de alumnos es obligatorio',
            'socio.required' => 'El campo socio comunitario es obligatorio',
            'año.required' => 'El campo año es obligatrio',
            'semestre.required' => 'El campo semestre es obligatario',
            'evidencia.required' => 'Debe agregar evidencia de la actividad'
        ]);
        aprendizaje::create([
            'asignatura' => $aprendizaje['asignatura'],
            'nombre' => $aprendizaje['nombre'],
            'cantidad' => $aprendizaje['cantidad'],
            'socio' => $aprendizaje['socio'],
            'año' => $aprendizaje['año'],
            'semestre' => $aprendizaje['semestre'],
            'evidencia' => $aprendizaje['evidencia']
        ]);
        return redirect()->route('aprendizaje.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function show(aprendizaje $aprendizaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function edit(aprendizaje $aprendizaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aprendizaje $aprendizaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(aprendizaje $aprendizaje)
    {
        //
    }
}
