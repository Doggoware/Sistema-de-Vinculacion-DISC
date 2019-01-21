<?php

namespace App\Http\Controllers;

use App\Consulta;
use App\aprendizaje;
use App\Convenio;
use App\extension;
use App\Titulados;
use Illuminate\Http\Request;

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

    public function todTitu(){
        $titulados = Titulados::all();
        return view('titulados.todos',compact('titulados'));
    }

    public function todas(){
        $aprendizaje = App\aprendizaje::find(1);
        $convenio = App\Convenio::find(1);
        $extension = App\extension::find(1);
        return view('consultas.todas',compact('aprendizaje','convenio','extension'));
    }

    public function show()
    {
        //
    }
}
