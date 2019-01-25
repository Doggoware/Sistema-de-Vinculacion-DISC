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
        $extension=extension::orderBy('id','DESC')->paginate(6);
        return view('extension.index',compact('extension'));
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
        request()->validate([
            'titulo' => 'required',
            'nombre' => 'required|array',
            'nombre.*' => ['required','regex:/^[\pL\s\-]+$/u'],
            'lugar' => ['required','regex:/^[\pL\s\-]+$/u'],
            'fecha' => 'required|before:today',
            'cantidad' => 'required|integer|min:0',
            'organizador' => 'required|array',
            'organizador.*' => ['required','regex:/^[\pL\s\-]+$/u'],
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
            $nombres[] = $filename;
            $paths[]   = $photos->storeAs('photos', $filename);
        }
        DB::table('extensions')->insert(
            [
                'titulo' => $request->input('titulo'),
                'nombre' => implode(",", $request->input('nombre')),
                'fecha' => $request->input('fecha'),
                'lugar' => $request->input('lugar'),
                'cantidad' => $request->input('cantidad'),
                'organizador' => implode(",", $request->input('organizador')),
                'tipo_convenio' => $request->input('tipo_convenio'),
                'evidencia' => implode(",", $nombres),
            ]);
        DB::table('indicadores')->where('nombre','Extension')->increment('actual');
        return redirect()->route('extension.index')->with('success','¡Datos agregados con éxito!');
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
    public function edit($id)
    {
        $extension=extension::find($id);
        $extension['nombre'] = explode(",", $extension['nombre']);
        $extension['organizador'] = explode(",", $extension['organizador']);
        return view('extension.edit',compact('extension'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'titulo' => 'required',
            'nombre' => 'required|array',
            'nombre.*' => ['required','regex:/^[\pL\s\-]+$/u'],
            'lugar' => ['required','regex:/^[\pL\s\-]+$/u'],
            'fecha' => 'required|before:today',
            'cantidad' => 'required|integer|min:0',
            'organizador' => 'required|array',
            'organizador.*' => ['required','regex:/^[\pL\s\-]+$/u'],
            'tipo_convenio' => '',
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
            'organizador.regex' => 'El nombre solo puede contener letras, es un nombre'
        ]);

        $extension = extension::find($id);
        $request['nombre'] = implode(",", $request->input('nombre'));
        $request['organizador'] = implode(",", $request->input('organizador'));
        $extension->update($request->all());
        return redirect()->route('extension.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\extension  $extension
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Extension::find($id)->delete();
        DB::table('indicadores')->where('nombre','Extension')->decrement('actual');
        return redirect()->route('extension.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
