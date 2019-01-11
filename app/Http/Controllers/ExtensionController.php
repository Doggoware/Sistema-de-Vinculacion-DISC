<?php

namespace App\Http\Controllers;

use App\extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        if(DB::table('actualizars')->where('id', '1')->doesntExist()){
            DB::table('actualizars')->insert([
                'convenios' => 0,
                'extension' => 0,
                'aprendizajes' => 0,
                'titulados' => 0,
                'titulacion' => 0
            ]);
        }

        request()->validate([
            'titulo' => 'required',
            'nombre' => ['required','regex:/^[A-Za-z]+([\ A-Za-z]+)*/'],
            'lugar' => ['required','regex:/(^([a-z|A-Z]+)$)/'],
            'fecha' => 'required|before:today',
            'cantidad' => 'required|integer|min:0',
            'organizador' => ['required','regex:/^[A-Za-z]+([\ A-Za-z]+)*/'],
            'tipo_convenio' => '',
            'evidencia' => 'required',
        ], [
            'titulo.required' => 'El campo título de actividad es obligatorio',
            'nombre.required' => 'El campo nombre del expositor es obligatorio',
            'nombre.regex' => 'El nombre solo puede contener letras, es un nombre',
            'lugar.required' => 'El campo lugar es obligatorio',
            'fecha.required' => 'El campo fecha es obligatorio',
            'fecha.before' => 'La fecha tiene que ser antes del día de hoy',
            'cantidad.required' => 'El campo cantidad de estudiantes es obligatario',
            'cantidad.integer' => 'La cantidad de asistentes tiene que ser un número entero positivo',
            'cantidad.min' => 'La cantidad de asiste tiene que ser un número entero positivo',
            'organizador.required' => 'El campo organizador es obligatorio',
            'organizador.regex' => 'El nombre solo puede contener letras, es un nombre',
            'evidencia.required' => 'Debe subir evidencia de la actividad'
        ]);
        $paths = [];
        foreach ($request->file('evidencia') as $photos) {
            $ext = $photos->getClientOriginalExtension();
            $filename  = 'evidencia-foto-' . time() . '.' . $ext;
            DB::table('extensions')->insert(
                [
                    'titulo' => $request->input('titulo'),
                    'nombre' => $request->input('nombre'),
                    'fecha' => $request->input('fecha'),
                    'lugar' => $request->input('lugar'),
                    'cantidad' => $request->input('cantidad'),
                    'organizador' => $request->input('organizador'),
                    'tipo_convenio' => $request->input('tipo_convenio'),
                    'evidencia' => $filename,
                ]);
            $paths[]   = $photos->storeAs('photos', $filename);
        }
        DB::table('actualizars')->where('id',1)->increment('extension');
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
