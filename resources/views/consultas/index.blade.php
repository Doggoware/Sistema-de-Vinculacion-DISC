@extends('layouts.master')

@section('content')
    <div class="row">
        <form class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Consultas sobre actividades</h3></div>
                    </div>
                    <div>
                        <a href='{{action('ConsultaController@todas')}}'>Revisar todas las actividades</a>
                    </div>
                    <div>
                        <a href='{{action('TituladosController@todos')}}'>Revisar todos los titulados</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection