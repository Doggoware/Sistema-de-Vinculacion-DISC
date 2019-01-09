<?php
namespace App\Http\Controllers;
use App\Titulados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TituladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulados = Titulados::all();
        return view('titulados.index',compact('titulados'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('titulados.create');
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
            'nombre_titulado' => ['required','regex:/^[A-Za-z]+([\ A-Za-z]+)*/'],
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

        DB::table('titulados')->insert(
            [
                'nombre_titulado' => $request->input('nombre_titulado'),
                'rut_titulado' => $request->input('rut_titulado'),
                'telefono_titulado' => $request->input('telefono_titulado'),
                'correo_titulado' => $request->input('correo_titulado'),
                'empresa_trabaja' => $request->input('empresa_trabaja'),
                'anio_titulacion' => $request->input('anio_titulacion'),
                'carrera' => $request->input('carrera'),

            ]);
        DB::table('actualizars')->where('id',1)->increment('titulados');
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
    public function edit(Titulados $titulados)
    {
        return view('titulados.edit', ['titulados'=>$titulados]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titulados  $titulados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titulados $titulados)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titulados  $titulados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulados $titulados)
    {
        //
    }
}
