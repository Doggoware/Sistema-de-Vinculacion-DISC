<?php
namespace App\Http\Controllers;
use App\Titulados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class TituladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $titulados=Titulados::orderBy('id','DESC')->paginate(6);
        return view('titulados.index',compact('titulados'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrera = DB::table('carreras')->pluck("nombre_ca");
        return view('titulados.create', compact('carrera'));
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
            'nombre_titulado' => 'required|array',
            'nombre_titulado.*' => ['required','regex:/^[\pL\s\-]+$/u'],
            'rut_titulado' => 'required|array',
            'rut_titulado.*' => 'required|regex: /^(\d{1,3}(?:\.\d{1,3}){2}-[\dkK])$/',
            'telefono_titulado' => 'nullable|array',
            'telefono_titulado.*' =>'nullable|integer|digits_between:7,9',
            'correo_titulado' => 'nullable|array',
            'correo_titulado.*'=>'nullable|email',
            'empresa_trabaja' => 'nullable|array',
            'empresa_trabaja.*'=>'nullable',
            'anio_titulacion' => 'required|array',
            'anio_titulacion.*'=>'required|integer|min:1900|digits:4',
            'carrera' => 'required|array',
            'carrera¨.*'=>'required',
        ],[
            'nombre_titulado.required'=>'El campo nombre es obligatorio',
            'nombre_titulado.regex'=>'El nombre tiene que ser solo letras',
            'rut_titulado.required' => 'El campo RUT es obligatorio',
            'rut_titulado.regex' => 'El RUT sigue este formato 11.111.111-1',
            'telefono_titulado.integer' => 'El teléfono debe ser un número entero de entre ocho y nueve digitos',
            'telefono_titulado.digits_between' => 'El teléfono debe ser un número entero de entre ocho y nueve digitos',
            'correo_titulado' => 'El correo del titulado debe ser valido',
            'anio_titulacion.required'=>'El campo año de titulacion es obligatorio',
            'anio_titulacion.integer' => 'El año de titulación debe ser un entero positivo',
            'anio_titulacion.min' => 'El año de titulación debe ser mayor a 1900',
            'anio_titulacion.digits' => 'El año de titulación debe contener cuatro digitos',
            'carrera.required'=>'El campo carrera es obligatorio',
        ]);
        $n = count($request->input('nombre_titulado'));
        $titu = $request->input('nombre_titulado');
        $rut = $request->input('rut_titulado');
        $tele = $request->input('telefono_titulado');
        $corr = $request->input('correo_titulado');
        $empr = $request->input('empresa_trabaja');
        $anio = $request->input('anio_titulacion');
        $car = $request->input('carrera');
        for($i = '0'; $i < $n; $i++){
            DB::table('titulados')->insert(
                [
                    'nombre_titulado' => $titu[$i],
                    'rut_titulado' => $rut[$i],
                    'telefono_titulado' => $tele[$i],
                    'correo_titulado' => $corr[$i],
                    'empresa_trabaja' => $empr[$i],
                    'anio_titulacion' => $anio[$i],
                    'carrera' => $car[$i],

                ]);
            DB::table('indicadores')->where('nombre','Titulados')->increment('actual');
        }
        return redirect()->route('titulados.index')->with('message', '¡Datos agregados con éxito!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Titulados  $titulados
     * @return \Illuminate\Http\Response
     */
    public function show(Titulados $titulados)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titulados  $titulados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titulado=titulados::find($id);
        $carrera = DB::table('carreras')->pluck('nombre_ca');
        return view('titulados.edit',compact('titulado', 'carrera'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titulados  $titulados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nombre_titulado' => ['required','regex:/^[\pL\s\-]+$/u'],
            'rut_titulado' => 'required|regex: /^(\d{1,3}(?:\.\d{1,3}){2}-[\dkK])$/',
            'telefono_titulado' =>'nullable|integer|digits_between:8,9',
            'correo_titulado'=>'nullable|email',
            'empresa_trabaja'=>'nullable',
            'anio_titulacion'=>'required|integer|min:1900|digits:4',
            'carrera'=>'required',
        ],[
            'nombre_titulado.required'=>'El campo nombre es obligatorio',
            'nombre_titulado.regex'=>'El nombre tiene que ser solo letras',
            'rut_titulado.required' => 'El campo RUT es obligatorio',
            'rut_titulado.regex' => 'El RUT sigue este formato 11.111.111-1',
            'telefono_titulado.integer' => 'El teléfono debe ser un número entero de entre ocho y nueve digitos',
            'telefono_titulado.digits_between' => 'El teléfono debe ser un número entero de entre ocho y nueve digitos',
            'correo_titulado' => 'El correo del titulado debe ser valido',
            'anio_titulacion.required'=>'El campo año de titulacion es obligatorio',
            'anio_titulacion.integer' => 'El año de titulación debe ser un entero positivo',
            'anio_titulacion.min' => 'El año de titulación debe ser mayor a 1900',
            'anio_titulacion.digits' => 'El año de titulación debe contener cuatro digitos',
            'carrera.required'=>'El campo carrera es obligatorio',
        ]);
        titulados::find($id)->update($request->all());
        return redirect()->route('titulados.index')->with('success','Registro actualizado satisfactoriamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titulados  $titulados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Titulados::find($id)->delete();
        DB::table('indicadores')->where('nombre','Titulados')->decrement('actual');
        return redirect()->route('titulados.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function todos(){


        $titulados = new Titulados;

        if(request()->has('carrera')){
            $titulados = $titulados->where('carrera',request('carrera'));
        }

        $titulados = $titulados->paginate(10)->appends('carrera',request('carrera'));

        return view('titulados.todos',compact('titulados'));
    }
    public function carrera($carrera){
        $titulado = Titulados::all();
        return view('titulados.carrera',compact('titulado'));
    }
    public function pdf(Request $request)
    {
        $titulados = titulados::all();
        $pdf = PDF::loadView('pdf.titulados', compact('titulados'));
        return $pdf->download('listadoTitulados.pdf');
    }
}
