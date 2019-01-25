<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\aprendizaje;
use App\Convenio;
use App\extension;
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
        $aprendizajes = DB::table('aprendizajes')->get();
        $convenio = DB::table('convenios')->get();
        $extension = DB::table('extensions')->get();
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
