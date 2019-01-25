<?php

namespace App\Http\Controllers;

use App\aprendizaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AprendizajeController extends Controller
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
        if(DB::table('asignaturas')->where('id', '1')->doesntExist()) {
            DB::table('asignaturas')->insert([
                'nombre_asig' => "Programcion Basica",
            ]);
            DB::table('asignaturas')->insert([
                'nombre_asig' => "Programacion Avanzada",
            ]);
            DB::table('asignaturas')->insert([
                'nombre_asig' => "Ingenieria de Software",
            ]);
            DB::table('asignaturas')->insert([
                'nombre_asig' => "Base de Datos",
            ]);
            DB::table('asignaturas')->insert([
                'nombre_asig' => "Compiladores",
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
        $aprendizaje=aprendizaje::orderBy('id','DESC')->paginate(6);
        return view('aprendizajes.index',compact('aprendizaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asign = DB::table('asignaturas')->pluck("nombre_asig");
        $items = DB::table('profesors')->pluck("nombre_pro");
        return view('aprendizajes.create', compact('items', 'asign'));
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
            'asignatura' => 'required',
            'nombre' => 'required|array',
            'nombre.*' => ['required','regex:/^[\pL\s\-]+$/u', 'distinct'],
            'cantidad' => 'required|integer|min:0',
            'socio' => 'required|array',
            'socio.*' => ['required','regex:/^[\pL\s\-]+$/u'],
            'año' => 'required|integer|digits:4|min:1900',
            'semestre' => 'required|integer|min:1|max:2',
            'evidencia' => 'required',
            'evidencia.*' => 'required',
        ], [
            'asignatura.required' => 'El campo nombre asignatura es obligatorio',
            'nombre.required' => 'El campo nombre del profesor es obligatorio',
            'nombre.regex' => 'El nombre debe contener solo letras',
            'nombre.distinct' => 'El nombre debe ser distinto',
            'cantidad.required' => 'El campo cantidad de alumnos es obligatorio',
            'socio.required' => 'El campo socio comunitario es obligatorio',
            'socio.regex' => 'El nombre del socio es un nombre, solo acepta letras',
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

        $paths = [];
        foreach ($request->file('evidencia') as $photos) {
            $ext = $photos->getClientOriginalExtension();
            $filename = 'evidencia-foto-' . time() . '.' . $ext;
            $nombres[] = $filename;
            $paths[] = $photos->storeAs('photos', $filename);
        }
        DB::table('aprendizajes')->insert(
            [
                'asignatura' => $request->input('asignatura'),
                'nombre' => implode(",", $request->input('nombre')),
                'cantidad' => $request->input('cantidad'),
                'socio' => implode(",", $request->input('socio')),
                'año' => $request->input('año'),
                'semestre' => $request->input('semestre'),
                'evidencia' => implode(",", $nombres)
            ]);
        DB::table('indicadores')->where('nombre','Actividad A+S')->increment('actual');
        return redirect()->route('aprendizaje.index')->with('success','¡Datos agregados con éxito!');
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
    public function edit($id)
    {
        $items = DB::table('profesors')->pluck("nombre_pro");
        $asig = DB::table('asignaturas')->pluck("nombre_asig");
        $aprendizaje=aprendizaje::find($id);
        $aprendizaje['nombre'] = explode(",", $aprendizaje['nombre']);
        $aprendizaje['socio'] = explode(",", $aprendizaje['socio']);
        return view('aprendizajes.edit', compact('aprendizaje',  'items', 'asig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'asignatura' => 'required',
            'nombre' => 'required|array',
            'nombre.*' => ['required','regex:/^[\pL\s\-]+$/u', 'distinct'],
            'cantidad' => 'required|integer|min:0',
            'socio' => 'required|array',
            'socio.*' => ['required','regex:/^[\pL\s\-]+$/u'],
            'año' => 'required|integer|digits:4|min:1900',
            'semestre' => 'required|integer|min:1|max:2',
        ], [
            'asignatura.required' => 'El campo nombre asignatura es obligatorio',
            'nombre.required' => 'El campo nombre del profesor es obligatorio',
            'nombre.regex' => 'El nombre debe contener solo letras',
            'nombre.distinct' => 'El nombre debe ser distinto',
            'cantidad.required' => 'El campo cantidad de alumnos es obligatorio',
            'socio.required' => 'El campo socio comunitario es obligatorio',
            'socio.regex' => 'El nombre del socio es un nombre, solo acepta letras',
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
        ]);

        $aprendizaje=Aprendizaje::find($id);
        $request['nombre'] = implode(",", $request->input('nombre'));
        $request['socio'] = implode(",", $request->input('socio'));
        $aprendizaje->update($request->all());
        return redirect()->route('aprendizaje.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aprendizaje  $aprendizaje
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aprendizaje::find($id)->delete();
        DB::table('indicadores')->where('nombre','Actividad A+S')->decrement('actual');
        return redirect()->route('aprendizaje.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
