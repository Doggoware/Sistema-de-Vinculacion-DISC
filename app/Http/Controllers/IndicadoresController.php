<?php

namespace App\Http\Controllers;

use App\Indicadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndicadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(DB::table('indicadores')->where('id', 1)->doesntExist()){
            DB::table('indicadores')->insert([
                'nombre' => "Convenios",
                'descripcion' => "Convenios de colaboracion",
                'formula' => "+1 por cada empresa en colaboracion",
                'evidencia' => "Cada convenio firmado",
                'fecha' => '2019',
                'objetivo' => '10',
                'actual' => 0
            ]);
            DB::table('indicadores')->insert([
                'nombre' => "Extension",
                'descripcion' => "Actividades de extension",
                'formula' => "+1 por cada actividad",
                'evidencia' => "Fotos del evento o asistencia",
                'fecha' => '2019',
                'objetivo' => '12',
                'actual' => 0
            ]);
            DB::table('indicadores')->insert([
                'nombre' => "Actividad A+S",
                'descripcion' => "Actividades de aprendizaje A+S",
                'formula' => "+1 por cada actividad",
                'evidencia' => "Acuerdo firmado entre profesor y socio",
                'fecha' => '2019',
                'objetivo' => '8',
                'actual' => 0
            ]);
            DB::table('indicadores')->insert([
                'nombre' => "Titulacion",
                'descripcion' => "Actividades de titulacion po convenio",
                'formula' => "+1 por cada actividad",
                'evidencia' => "Formulario inscripcion actividad",
                'fecha' => '2019',
                'objetivo' => '5',
                'actual' => 0
            ]);
            DB::table('indicadores')->insert([
                'nombre' => "Titulados",
                'descripcion' => "Ex alumnos del DISC ya titulados",
                'formula' => "+1 por cada alumno titulado",
                'evidencia' => "Ninguna",
                'fecha' => '2019',
                'objetivo' => '10',
                'actual' => 0
            ]);
        }
        $indicadores=Indicadores::orderBy('id','ASC')->paginate(6);
        return view('indicadores.index',compact('indicadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('indicadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'formula' => 'required',
            'evidencia' => 'required',
            'fecha' => 'required|array',
            'fecha.*' => 'required|integer|digits:4|min:1900',
            'objetivo' => 'required|array',
            'objetivo.*' => 'required|integer|min:1',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'formula.required' => 'El campo formula es obligatorio',
            'evidencia.required' => 'El campo evidencia es obligatorio',
            'fecha.*.required' => 'El campo fecha es obligatorio',
            'fecha.*.integer' => 'El campo fecha debe ser entero positivo',
            'fecha.*.digits' => 'El campo fecha debe contener cuatro digitos',
            'fecha.*.min' => 'El campo fecha debe ser superior a 1900',
            'objetivo.*.required' => 'El campo objetivo es obligatorio',
            'objetivo.*.integer' => 'El campo objetivo debe ser un número',
            'objetivo.*.min' => 'El campo objetivo debe ser mayor a uno'
        ]);

        DB::table('indicadores')->insert(
            [
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'formula' => $request->input('formula'),
                'evidencia' => $request->input('evidencia'),
                'fecha' => implode(",", $request->input('fecha')),
                'objetivo' => implode(",", $request->input('objetivo')),
                'actual' => 0
            ]);
        return redirect()->route('indicadores.index')->with('success','¡Datos agregados con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function show(Indicadores $indicadores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicadores=Indicadores::find($id);
        $indicadores['fecha'] = explode(",", $indicadores['fecha']);
        $indicadores['objetivo'] = explode(",", $indicadores['objetivo']);
        return view('indicadores.edit',compact('indicadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'formula' => 'required',
            'evidencia' => 'required',
            'fecha' => 'required|array',
            'fecha.*' => 'required|integer|digits:4|min:1900',
            'objetivo' => 'required|array',
            'objetivo.*' => 'required|integer|min:1',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'formula.required' => 'El campo formula es obligatorio',
            'evidencia.required' => 'El campo evidencia es obligatorio',
            'fecha.*.required' => 'El campo fecha es obligatorio',
            'fecha.*.integer' => 'El campo fecha debe ser entero positivo',
            'fecha.*.digits' => 'El campo fecha debe contener cuatro digitos',
            'fecha.*.min' => 'El campo fecha debe ser superior a 1900',
            'objetivo.*.required' => 'El campo objetivo es obligatorio',
            'objetivo.*.integer' => 'El campo objetivo debe ser un número',
            'objetivo.*.min' => 'El campo objetivo debe ser mayor a uno'
        ]);
        $indicadores = Indicadores::find($id);
        $request['fecha'] = implode(",", $request['fecha']);
        $request['objetivo'] = implode(",", $request['objetivo']);
        $indicadores->update($request->all());
        return redirect()->route('indicadores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indicadores  $indicadores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Indicadores::find($id)->delete();
        return redirect()->route('indicadores.index')->with('success','Registro eliminado satisfactoriamente');
    }
}

