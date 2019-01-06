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
            'nombre' => ['required','regex:/^[A-Za-z]+([\ A-Za-z]+)*/'],
            'cantidad' => 'required|integer|min:0',
            'socio' => ['required','regex:/^[A-Za-z]+([\ A-Za-z]+)*/'],
            'año' => 'required|integer|digits:4|min:1900',
            'semestre' => 'required|integer|min:1|max:2',
            'evidencia' => 'required',
        ], [
            'asignatura.required' => 'El campo nombre asignatura es obligatorio',
            'nombre.required' => 'El campo nombre del profesor es obligatorio',
            'nombre.regex' => 'El nombre debe contener solo letras',
            'cantidad.required' => 'El campo cantidad de alumnos es obligatorio',
            'socio.required' => 'El campo socio comunitario es obligatorio',
            'cantidad.integer' => 'La cantidad de participantes tiene que ser un entero positivo',
            'cantidad.min' => 'La cantidad de participantes tiene que ser un entero positivo',
            'año.required' => 'El campo año es obligatrio',
            'año.integer' => 'El año tiene que ser un entero positivo',
            'año.min' => 'El año tiene que ser un entero positivo mayor a 1900',
            'año.digits' => 'El año tiene que contener cuatro digitos',
            'semestre.required' => 'El campo semestre es obligatario',
            'semestre.integer' => 'El semestre tiene que ser un entero positivo',
            'semetre.min' => 'El semestre tiene que ser mínimo 1',
            'semestre.max' => 'El semestre tiene que ser máximo 2',
            'evidencia.required' => 'Debe agregar evidencia de la actividad'
        ]);

        // cache the file
        $file = $request->file('evidencia');
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'evidencia-' . time() . '.' . $file->getClientOriginalExtension();
        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('photos', $filename);

        $apre = aprendizaje::create([
            'asignatura' => $aprendizaje['asignatura'],
            'nombre' => $aprendizaje['nombre'],
            'cantidad' => $aprendizaje['cantidad'],
            'socio' => $aprendizaje['socio'],
            'año' => $aprendizaje['año'],
            'semestre' => $aprendizaje['semestre'],
            'evidencia' => $aprendizaje['evidencia']
        ]);
        $apre -> save();
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
