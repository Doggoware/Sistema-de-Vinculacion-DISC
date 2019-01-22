
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
                        <div class="pull-left"><h3>Lista de Actividades de Aprendizajes + Servicios</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('aprendizaje.create') }}" class="btn btn-info" >Añadir Actividad de Aprendizaje + Servicio</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre de la asignatura</th>
                                <th>Nombre del profesor</th>
                                <th>Cantidad de estudiantes</th>
                                <th>Nombre del socio comunitario</th>
                                <th>Año</th>
                                <th>Semestre</th>
                                <th>Listado de participantes</th>
                                </thead>
                                <tbody>
                                @if($aprendizaje->count())
                                    @foreach($aprendizaje as $apren)
                                        <tr>
                                            <td>{{$apren->asignatura}}</td>
                                            <td>{{$apren->nombre}}</td>
                                            <td>{{$apren->cantidad}}</td>
                                            <td>{{$apren->socio}}</td>
                                            <td>{{$apren->año}}</td>
                                            <td>{{$apren->semestre}}</td>
                                            <td>{{$apren->evidencia}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('AprendizajeController@edit', $apren->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('AprendizajeController@destroy', $apren->id)}}" method="post">
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
                    {{ $aprendizaje->links() }}
                </div>
            </div>

        </section>
    </div>
@endsection