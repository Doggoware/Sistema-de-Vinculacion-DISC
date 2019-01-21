<?php

namespace App\Http\Controllers;

use App\Titulados;
use Illuminate\Http\Request;
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

        $titulados=Titulados::orderBy('id','DESC')->paginate(3);
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
        $titulados = request()->validate([
            'nombre_titulado' => ['required','regex:/(^([a-z|A-Z]+)$)/'],
            'rut_titulado' => 'required',
            'telefono_titulado' =>'nullable|integer|digits:8|min:0',
            'correo_titulado'=>'sometimes',
            'empresa_trabaja'=>'sometimes',
            'año_titulacion'=>'required|integer|digits:4|min:0',
            'carrera'=>'required',
        ],[
            'nombre_titulado.required'=>'El campo nombre es obligatorio',
            'rut_titulado.required' => 'El campo RUT es obligatorio',
            'año_titulacion.required'=>'El campo año de titulacion es obligatorio',
            'carrera.required'=>'El campo carrera es obligatorio',
        ]);

        $titus = Titulados::create([
            'nombre_titulado' => $titulados['nombre_titulado'],
            'rut_titulado' => $titulados['rut_titulado'],
            'telefono_titulado' => $titulados['telefono_titulado'],
            'correo_titulado' =>$titulados['correo_titulado'],
            'empresa_trabaja'=>$titulados['empresa_trabaja'],
            'año_titulacion' => $titulados['año_titulacion'],
            'carrera' => $titulados['carrera'],
        ]);

        $titus->save();
        return redirect()->route('titulados.index')->with('success','Registro creado satisfactoriamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Titulados  $titulados
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* $titulados=titulados::find($id);
        return  view('titulados.show',compact('titulados'));*/
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
        return view('titulados.edit',compact('titulado'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titulados  $titulados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $titulados = request()->validate([
            'nombre_titulado' => ['required','regex:/(^([a-z|A-Z]+)$)/'],
            'rut_titulado' => 'required',
            'telefono_titulado' =>'nullable|integer|digits:8|min:0',
            'correo_titulado'=>'sometimes',
            'empresa_trabaja'=>'sometimes',
            'año_titulacion'=>'required|integer|digits:4|min:0',
            'carrera'=>'required',
        ],[
            'nombre_titulado.required'=>'El campo nombre es obligatorio',
            'rut_titulado.required' => 'El campo RUT es obligatorio',
            'año_titulacion.required'=>'El campo año de titulacion es obligatorio',
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
        return redirect()->route('titulados.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function todos(){
        $titulado = Titulados::all();
        return view('titulados.todos',compact('titulado'));
    }

    public function carrera($carrera){
        $titulado = Titulados::where('carrera',$carrera);
        return view('titulados.carrera',compact('titulado'));
    }

    public function pdf(Request $request)
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
         **/
        $titulados = titulados::all();

        $pdf = PDF::loadView('pdf.titulados', compact('titulados'));

        return $pdf->download('listado.pdf');
    }
}
