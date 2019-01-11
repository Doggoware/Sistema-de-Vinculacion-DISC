@extends('layouts.master')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Actividades de Titulación por Convenio</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('titulacion.create') }}" class="btn btn-info" >Añadir Actividad de Titulación</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Titulo Actividad</th>
                                <th>Cantidad de estudiantes</th>
                                <th>Nombre de estudiante</th>
                                <th>Rut del estudiante</th>
                                <th>Carrera del estudiante</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de termino</th>
                                <th>Profesor guía</th>
                                <th>Cantidad de profesores</th>
                                <th>Empresa</th>
                                <th>Evidencia</th>
                                </thead>
                                <tbody>
                                @if($titulacion->count())
                                    @foreach($titulacion as $titu)
                                        <tr>
                                            <td>{{$titu->titulo_actividad}}</td>
                                            <td>{{$titu->cant_estudiantes}}</td>
                                            <td>{{$titu->nombre_estudiante}}</td>
                                            <td>{{$titu->rut}}</td>
                                            <td>{{$titu->carrera}}</td>
                                            <td>{{$titu->fecha_inicio}}</td>
                                            <td>{{$titu->fecha_fin}}</td>
                                            <td>{{$titu->prof_guia}}</td>
                                            <td>{{$titu->cant_prof_guia}}</td>
                                            <td>{{$titu->empresa}}</td>
                                            <td>{{$titu->evidencia}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('TitulacionController@edit', $titu->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('TitulacionController@destroy', $titu->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                </form>
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
                    {{ $titulacion->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
