@extends('layouts.master')

@section('content')
    <div class="pull-left"><h1>Lista Titulados</h1></div><br/><br/>
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="pull-right">
                            <a href="{{action('TituladosController@pdf')}}" class="btn btn-sm btn-primary">
                                Descargar archivo listadoTitulados.pdf
                            </a>
                        </div>

                        Filtro:<br/>
                        <a href="/todos?carrera=Ingenieria civil en computacion e informatica">Ingenieria civil en computacion e informatica</a><br/>
                        <a href="/todos?carrera=Ingenieria en ejecucion en computacion e informatica">Ingenieria en ejecucion en computacion e informatica</a><br/>
                        <a href="/todos?carrera=Ingenieria en computacion">Ingenieria en computacion</a><br/>
                        <a href="/todos">Quitar Filtros</a>


                        <div class="table-container">
                            <table id="mytable" class="table table-bordered table-striped">
                                <thead>
                                <th>Nombre</th>
                                <th>RUT</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Empresa</th>
                                <th>Año de titulación</th>
                                <th>Carrera</th>
                                </thead>
                                <tbody>
                                @if($titulados->count())
                                    @foreach($titulados as $titulado)
                                        <tr>
                                            <td>{{$titulado->nombre_titulado}}</td>
                                            <td>{{$titulado->rut_titulado}}</td>
                                            <td>{{$titulado->telefono_titulado}}</td>
                                            <td>{{$titulado->correo_titulado}}</td>
                                            <td>{{$titulado->empresa_trabaja}}</td>
                                            <td>{{$titulado->año_titulacion}}</td>
                                            <td>{{$titulado->carrera}}</td>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">No hay registro !!</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <a href="{{ route('consultas.index') }}" class="btn btn-info btn-sm" >Atrás</a>
            </div>
        </section>
    </div>
@endsection