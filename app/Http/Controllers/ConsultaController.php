<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\aprendizaje;
use App\Convenio;
use App\extension;
use App\Titulacion;
use App\Titulados;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ConsultaController extends Controller
{

    public function create()
    {
        //
    }

    public function index()
    {
        return view('consultas.index');
    }

    public function todas(){

        $aprendizajes = new aprendizaje;
        $convenio = new convenio;
        $extension = new extension;
        $titulacion = new Titulacion;



        if(request()->has('all')){
            $aprendizajes = DB::table('aprendizajes')->get();
            $convenio = DB::table('convenios')->get();
            $extension = DB::table('extensions')->get();
        }else {
            if (request()->has('aprendizaje')) {
                $aprendizajes = DB::table('aprendizajes')->get();
            } else {
                $aprendizajes = DB::table('aprendizajes')->where('nombre', '');
            }

            if (request()->has('convenio')) {
                $convenio = DB::table('convenios')->get();
            } else {
                $convenio = DB::table('convenios')->where('nombre_empresa', '');
            }

            if (request()->has('extension')) {
                $extension = DB::table('extensions')->get();
            } else {
                $extension = DB::table('extensions')->where('nombre', '');
            }
        }
       /* if(request()->has('titulacion')){
            $titulacion = DB::table('titulacions')->get();
        }else{
            $titulacion = DB::table('titulacions')->where('titulo','');
        }*/

        /*$aprendizajes = DB::table('aprendizajes')->get();
        $convenio = DB::table('convenios')->get();
        $extension = DB::table('extensions')->get();*/
        $titulacion = DB::table('titulacions')->get();
        return view('consultas.todas',compact('aprendizajes','convenio','extension','titulacion'));
    }

    public function pdf(Request $request)
    {
        $aprendizajes = DB::table('aprendizajes')->get();
        $convenio = DB::table('convenios')->get();
        $extension = DB::table('extensions')->get();
        $titulacion = DB::table('titulacions')->get();


        $pdf = PDF::loadView('pdf.actividades', compact('aprendizajes','convenio','extension','titulacion'));

        return $pdf->download('listadoActividades.pdf');
    }

    public function show()
    {
        //
    }
}
