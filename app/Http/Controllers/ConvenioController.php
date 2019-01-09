<?php

namespace App\Http\Controllers;

use App\Convenio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'nombre_empresa' => 'required',
            'tipo_convenio' => 'required',
            'fecha_inicio' => 'required|before:today',
            'fecha_termino' => 'required|after_or_equal:fecha_inicio',
            'evidencia' => 'required',
        ], [
            'nombre_empresa.required' => 'El campo nombre es obligatorio',
            'tipo_convenio.required' => 'El campo convenio es obligatorio',
            'fecha_inicio.required' => 'El campo fecha de inicio es obligatorio',
            'fecha_inicio.before' => 'La fecha de inicio tiene que ser antes del día de hoy',
            'fecha_termino.required' => 'El campo fecha de termino es obligatorio',
            'fecha_termino.after_or_equal' => 'La fecha de termino tiene que ser después de la fecha de inicio establecida',
            'evidencia.required' => 'Debe subir un archivo .pdf',
        ]);

        // cache the file
        $file = $request->file('evidencia');
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'evidencia-' . time() . '.' . $file->getClientOriginalExtension();
        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('photos', $filename);

        $input = $request->all();
        $tipo = $request->input('tipo_convenio');
        foreach($tipo as $tip){
            DB::table('convenios')->insert(
                [
                    'nombre_empresa' => $request->input('nombre_empresa'),
                    'tipo_convenio' => $tip,
                    'fecha_inicio' => $request->input('fecha_inicio'),
                    'fecha_termino' => $request->input('fecha_termino'),
                    'evidencia' => $filename,

            ]);
        }
        DB::table('actualizars')->where('id',1)->increment('convenios');
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
