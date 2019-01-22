<?php

namespace App\Http\Controllers;

use App\Titulacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulacion=titulacion::orderBy('id','DESC')->paginate(3);
        return view('titulacion.index',compact('titulacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('titulacion.create');
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
        $titulacion = request()->validate([
            'titulo_actividad' => 'required',
            'cant_estudiantes' => 'required|integer|digits:1|min:1',
            'nombre_estudiante' => ['required','regex:/^[A-Za-z]+([\ A-Za-z]+)*/'],
            'rut' => 'required|regex: /^(\d{1,3}(?:\.\d{1,3}){2}-[\dkK])$/',
            'carrera' => 'required',
            'fecha_inicio' => 'required|before:today',
            'fecha_fin' => 'required|after_or_equal:fecha_inicio',
            'prof_guia' => ['required','regex:/^[A-Za-z]+([\ A-Za-z]+)*/'],
            'cant_prof_guia'=>'required|integer|digits:1|min:1',
            'empresa'=>'required',
            'evidencia' => 'required',
        ], [
            'titulo_actividad.required' => 'campo titulo es obligatorio',
            'cant_estudiantes.required' => 'campo cantidad es obligatorio',
            'cant_estudiantes.integer' => 'La cantidad de estudiantes debe ser un número entero positivo de 1 a 9',
            'cant_estudiantes.digits' => 'La cantidad de estudiantes debe ser un número entero positivo de 1 a 9',
            'cant_estudiantes.min' => 'La cantidad de estudiantes debe ser un número entero positivo de 1 a 9',
            'nombre_estudiante.required' => 'campo nombre estudiante es obligatorio',
            'nombre_estudiante.regex' => 'El formato no cumple con lo solicitado, es un nombre, solo lentras',
            'rut.required' => 'campo rut es obligatorio',
            'rut.regex' => 'El campo rut no cumple con el formato de 11.111.111-1, por ejemplo',
            'carrera.required' => 'El campo carrera es obligatorio',
            'fecha_inicio.required' => 'campo fecha de inicio es obligatorio',
            'fecha_inicio.before' => 'La fecha de inicio tiene que ser de antes de hoy',
            'fecha_fin.required' => 'campo fecha de termino es obligatorio',
            'fecha_fin.after_or_equal' => 'La fecha de fin tiene que ser después de la fecha de inicio',
            'prof_guia.required' => 'campo profesor es obligatorio',
            'prof_guia.regex' => 'El nombre del profesor guía no sigue el formato, solo letras',
            'cant_prof_guia.required'=>'campo cantidad profesor es obligatoria',
            'cant_prof_guia.integer' => 'La cantidad de profesores guía debe ser un número entero positivo de 1 a 9',
            'cant_prof_guia.digits' => 'La cantidad de profesores guía debe ser un número entero positivo de 1 a 9',
            'cant_prof_guia.min' => 'La cantidad de profesores guía debe ser un número entero positivo de 1 a 9',
            'empresa.required'=>'campo empresa es obligatorio',
            'evidencia.required' => 'campo evidencia es obligatorio',
        ]);
        $file = $request->file('evidencia');
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'evidencia-' . time() . '.' . $file->getClientOriginalExtension();
        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('photos', $filename);

        titulacion::create([
            'titulo_actividad' => $titulacion['titulo_actividad'],
            'cant_estudiantes' => $titulacion['cant_estudiantes'],
            'nombre_estudiante' => $titulacion['nombre_estudiante'],
            'rut' => $titulacion['rut'],
            'carrera' => $titulacion['carrera'],
            'fecha_inicio' => $titulacion['fecha_inicio'],
            'fecha_fin' => $titulacion['fecha_fin'],
            'prof_guia' => $titulacion['prof_guia'],
            'cant_prof_guia'=>$titulacion['cant_prof_guia'],
            'empresa'=>$titulacion['empresa'],
            'evidencia' => $filename,
        ]);
        DB::table('actualizars')->where('id',1)->increment('titulacion');
        return redirect()->route('titulacion.index')->with('message', '¡Datos agregados con éxito!');
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
        $titulacion = request()->validate([
            'titulo_actividad' => 'required',
            'cant_estudiantes' => 'required|integer|digits:1|min:1',
            'nombre_estudiante' => ['required','regex:/^[A-Za-z]+([\ A-Za-z]+)*/'],
            'rut' => 'required|regex: /^(\d{1,3}(?:\.\d{1,3}){2}-[\dkK])$/',
            'carrera' => 'required',
            'fecha_inicio' => 'required|before:today',
            'fecha_fin' => 'required|after_or_equal:fecha_inicio',
            'prof_guia' => ['required','regex:/^[A-Za-z]+([\ A-Za-z]+)*/'],
            'cant_prof_guia'=>'required|integer|digits:1|min:1',
            'empresa'=>'required',
            'evidencia' => 'required',
        ], [
            'titulo_actividad.required' => 'campo titulo es obligatorio',
            'cant_estudiantes.required' => 'campo cantidad es obligatorio',
            'cant_estudiantes.integer' => 'La cantidad de estudiantes debe ser un número entero positivo de 1 a 9',
            'cant_estudiantes.digits' => 'La cantidad de estudiantes debe ser un número entero positivo de 1 a 9',
            'cant_estudiantes.min' => 'La cantidad de estudiantes debe ser un número entero positivo de 1 a 9',
            'nombre_estudiante.required' => 'campo nombre estudiante es obligatorio',
            'nombre_estudiante.regex' => 'El formato no cumple con lo solicitado, es un nombre, solo lentras',
            'rut.required' => 'campo rut es obligatorio',
            'rut.regex' => 'El campo rut no cumple con el formato de 11.111.111-1, por ejemplo',
            'carrera.required' => 'El campo carrera es obligatorio',
            'fecha_inicio.required' => 'campo fecha de inicio es obligatorio',
            'fecha_inicio.before' => 'La fecha de inicio tiene que ser de antes de hoy',
            'fecha_fin.required' => 'campo fecha de termino es obligatorio',
            'fecha_fin.after_or_equal' => 'La fecha de fin tiene que ser después de la fecha de inicio',
            'prof_guia.required' => 'campo profesor es obligatorio',
            'prof_guia.regex' => 'El nombre del profesor guía no sigue el formato, solo letras',
            'cant_prof_guia.required'=>'campo cantidad profesor es obligatoria',
            'cant_prof_guia.integer' => 'La cantidad de profesores guía debe ser un número entero positivo de 1 a 9',
            'cant_prof_guia.digits' => 'La cantidad de profesores guía debe ser un número entero positivo de 1 a 9',
            'cant_prof_guia.min' => 'La cantidad de profesores guía debe ser un número entero positivo de 1 a 9',
            'empresa.required'=>'campo empresa es obligatorio',
            'evidencia.required' => 'campo evidencia es obligatorio',
        ]);

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
        Titulacion::find($id)->delete();
        DB::table('actualizars')->where('id',1)->decrement('titulacion');
        return redirect()->route('titulacion.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
