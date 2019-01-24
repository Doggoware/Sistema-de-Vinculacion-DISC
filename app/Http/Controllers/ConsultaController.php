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
        return view('consultas.todas',compact('aprendizajes','convenio','extension'));
    }

    public function pdf(Request $request)
    {
        $aprendizajes = DB::table('aprendizajes')->get();
        $convenio = DB::table('convenios')->get();
        $extension = DB::table('extensions')->get();

        $pdf = PDF::loadView('pdf.actividades', compact('aprendizajes','convenio','extension'));

        return $pdf->download('listadoActividades.pdf');
    }

    public function show()
    {
        //
    }
}
