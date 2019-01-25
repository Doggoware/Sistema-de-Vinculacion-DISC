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
        if(DB::table('profesors')->where('id', '1')->doesntExist()) {
            DB::table('profesors')->insert([
                'nombre_pro' => "Brian Keith",
            ]);
            DB::table('profesors')->insert([
                'nombre_pro' => "Vianca Vega",
            ]);
            DB::table('profesors')->insert([
                'nombre_pro' => "Aldo Quepana",
            ]);
            DB::table('profesors')->insert([
                'nombre_pro' => "Profesor Anónimo",
            ]);
            DB::table('profesors')->insert([
                'nombre_pro' => "Profesor A",
            ]);
        }
        if(DB::table('carreras')->where('id', '1')->doesntExist()) {
            DB::table('carreras')->insert([
                'nombre_ca' => "Ingenieria civil en computacion e informatica",
            ]);
            DB::table('carreras')->insert([
                'nombre_ca' => "Ingenieria en ejecucion en computacion e informatica",
            ]);
            DB::table('carreras')->insert([
                'nombre_ca' => "Ingenieria en computacion",
            ]);
        }
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
        $titulacion=titulacion::orderBy('id','DESC')->paginate(6);
        return view('titulacion.index',compact('titulacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrera = DB::table('carreras')->pluck("nombre_ca");
        $items = DB::table('profesors')->pluck("nombre_pro");
        $empresa = DB::table('convenios')->pluck("nombre_empresa");
        return view('titulacion.create', compact('carrera', 'items', 'empresa'));
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
            'nombre_estudiante' => 'required|array',
            'nombre_estudiante.*' => ['required','regex:/^[\pL\s\-]+$/u', 'distinct'],
            'rut' => 'required|array',
            'rut.*' => ['required', 'regex: /^(\d{1,3}(?:\.\d{1,3}){2}-[\dkK])$/', 'distinct'],
            'carrera' => 'required|array',
            'carrera.*' => ['required'],
            'fecha_inicio' => 'required|before:today',
            'fecha_fin' => 'required|after_or_equal:fecha_inicio',
            'prof_guia' => 'required|array',
            'prof_guia.*' => ['required','regex:/^[\pL\s\-]+$/u'],
            'empresa'=>'required',
            'evidencia' => 'required',
        ], [
            'titulo.required' => 'campo titulo es obligatorio',
            'nombre_estudiante.required' => 'campo nombre estudiante es obligatorio',
            'nombre_estudiante.regex' => 'El nombre no cumple con lo solicitado, es un nombre, solo letras',
            'rut.required' => 'campo rut es obligatorio',
            'rut.regex' => 'El campo rut no cumple con el formato de 11.111.111-1, por ejemplo',
            'carrera.required' => 'El campo carrera es obligatorio',
            'fecha_inicio.required' => 'campo fecha de inicio es obligatorio',
            'fecha_inicio.before' => 'La fecha de inicio tiene que ser de antes de hoy',
            'fecha_fin.required' => 'campo fecha de termino es obligatorio',
            'fecha_fin.after_or_equal' => 'La fecha de fin tiene que ser después de la fecha de inicio',
            'prof_guia.required' => 'campo profesor es obligatorio',
            'prof_guia.regex' => 'El nombre del profesor guía no sigue el formato, solo letrass',
            'empresa.required'=>'campo empresa es obligatorio',
            'evidencia.required' => 'campo evidencia es obligatorio',
        ]);
        $file = $request->file('evidencia');
        // generate a new filename. getClientOriginalExtension() for the file extension
        $filename = 'evidencia-' . time() . '.' . $file->getClientOriginalExtension();
        // save to storage/app/photos as the new $filename
        $path = $file->storeAs('photos', $filename);
        DB::table('titulacions')->insert(
            [
                'titulo' => $request->input('titulo'),
                'nombre_estudiante' => implode(",", $request->input('nombre_estudiante')),
                'rut' => implode(",", $request->input('rut')),
                'carrera' => implode(",", $request->input('carrera')),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_fin' => $request->input('fecha_fin'),
                'prof_guia' => implode(",", $request->input('prof_guia')),
                'empresa' => $request->input('empresa'),
                'evidencia' => $filename,
            ]
        );
        DB::table('indicadores')->where('nombre','Titulacion')->increment('actual');
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
        $carrera = DB::table('carreras')->pluck("nombre_ca");
        $items = DB::table('profesors')->pluck("nombre_pro");
        $empresa = DB::table('convenios')->pluck("nombre_empresa");
        $titulacion=titulacion::find($id);
        $titulacion['nombre_estudiante'] = explode(",", $titulacion['nombre_estudiante']);
        $titulacion['rut'] = explode(",", $titulacion['rut']);
        $titulacion['carrera'] = explode(",", $titulacion['carrera']);
        $titulacion['prof_guia'] = explode(",", $titulacion['prof_guia']);
        return view('titulacion.edit',compact('titulacion', 'carrera','items', 'empresa' ));
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
        request()->validate([
            'titulo_actividad' => 'required',
            'nombre_estudiante' => 'required|array',
            'nombre_estudiante.*' => ['required','regex:/^[\pL\s\-]+$/u', 'distinct'],
            'rut' => 'required|array',
            'rut.*' => ['required', 'regex: /^(\d{1,3}(?:\.\d{1,3}){2}-[\dkK])$/', 'distinct'],
            'carrera' => 'required|array',
            'carrera.*' => ['required'],
            'fecha_inicio' => 'required|before:today',
            'fecha_fin' => 'required|after_or_equal:fecha_inicio',
            'prof_guia' => 'required|array',
            'prof_guia.*' => ['required','regex:/^[\pL\s\-]+$/u'],
            'empresa'=>'required',
        ], [
            'titulo_actividad.required' => 'campo titulo es obligatorio',
            'nombre_estudiante.required' => 'campo nombre estudiante es obligatorio',
            'nombre_estudiante.regex' => 'El nombre no cumple con lo solicitado, es un nombre, solo letras',
            'rut.required' => 'campo rut es obligatorio',
            'rut.regex' => 'El campo rut no cumple con el formato de 11.111.111-1, por ejemplo',
            'carrera.required' => 'El campo carrera es obligatorio',
            'fecha_inicio.required' => 'campo fecha de inicio es obligatorio',
            'fecha_inicio.before' => 'La fecha de inicio tiene que ser de antes de hoy',
            'fecha_fin.required' => 'campo fecha de termino es obligatorio',
            'fecha_fin.after_or_equal' => 'La fecha de fin tiene que ser después de la fecha de inicio',
            'prof_guia.required' => 'campo profesor es obligatorio',
            'prof_guia.regex' => 'El nombre del profesor guía no sigue el formato, solo letrass',
            'empresa.required'=>'campo empresa es obligatorio',
        ]);
        $titulacion = titulacion::find($id);
        $request['nombre_estudiante'] = implode(",", $request->input('nombre_estudiante'));
        $request['rut'] = implode(",", $request->input('rut'));
        $request['carrera'] = implode(",", $request->input('carrera'));
        $request['prof_guia'] = implode(",", $request->input('prof_guia'));
        $titulacion->update($request->all());
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
        DB::table('indicadores')->where('nombre','Titulacion')->decrement('nombre');
        return redirect()->route('titulacion.index')->with('success','Registro eliminado satisfactoriamente');
    }
}

