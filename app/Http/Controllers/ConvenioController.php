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
        $convenios=Convenio::orderBy('id','DESC')->paginate(6);
        return view('convenios.index',compact('convenios'));
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
        request()->validate([
            'nombre_empresa' => 'required',
            'tipo_convenio' => 'required|array',
            'tipo_convenio.*' => 'required|distinct',
            'fecha_inicio' => 'required|before:today',
            'fecha_termino' => 'required|after_or_equal:fecha_inicio',
            'evidencia' => 'required|array',
            'evidencia.*' => 'required',
        ], [
            'nombre_empresa.required' => 'El campo nombre es obligatorio',
            'tipo_convenio.required' => 'El campo convenio es obligatorio',
            'tipo_convenio.distinct' => 'Asegurese de que ha seleccionado convenios diferentes',
            'fecha_inicio.required' => 'El campo fecha de inicio es obligatorio',
            'fecha_inicio.before' => 'La fecha de inicio tiene que ser antes del día de hoy',
            'fecha_termino.after_or_equal' => 'La fecha de termino tiene que ser después de la fecha de inicio establecida',
            'evidencia.required' => 'Debe subir un archivo .pdf',
        ]);

        // cache the file
        $paths = [];
        foreach ($request->file('evidencia') as $photos) {
            $ext = $photos->getClientOriginalExtension();
            $filename = 'evidencia-foto-' . time() . '.' . $ext;
            $nombres[] = $filename;
            $paths[] = $photos->storeAs('photos', $filename);
        }
        DB::table('convenios')->insert(
            [
                'nombre_empresa' => $request->input('nombre_empresa'),
                'tipo_convenio' => implode(",", $request->input('tipo_convenio')),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_termino' => $request->input('fecha_termino'),
                'evidencia' => implode(",", $nombres),
            ]);
        DB::table('indicadores')->where('nombre', 'Convenios')->increment('actual');

        return redirect()->route('convenio.index')->with('success','¡Datos agregados con éxito!');
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
    public function edit($id)
    {
        $convenio=convenio::find($id);
        $convenio['tipo_convenio'] = explode(",", $convenio['tipo_convenio']);
        return view('convenios.edit',compact('convenio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nombre_empresa' => 'required',
            'tipo_convenio' => 'required|array',
            'tipo_convenio.*' => 'required',
            'fecha_inicio' => 'required|before:today',
            'fecha_termino' => 'required|after_or_equal:fecha_inicio',
        ], [
            'nombre_empresa.required' => 'El campo nombre es obligatorio',
            'tipo_convenio.required' => 'El campo convenio es obligatorio',
            'fecha_inicio.required' => 'El campo fecha de inicio es obligatorio',
            'fecha_inicio.before' => 'La fecha de inicio tiene que ser antes del día de hoy',
            'fecha_termino.after_or_equal' => 'La fecha de termino tiene que ser después de la fecha de inicio establecida',
        ]);
        $convenio=convenio::find($id);
        $request['tipo_convenio'] = implode(",", $request->input('tipo_convenio'));
        $convenio->update($request->all());
        return redirect()->route('convenio.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Convenio::find($id)->delete();
        DB::table('indicadores')->where('nombre','Convenios')->decrement('actual');
        return redirect()->route('convenio.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
