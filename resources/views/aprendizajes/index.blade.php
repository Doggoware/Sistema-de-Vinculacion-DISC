@extends('layouts.master')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Titulados</h3></div>
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
                                    @foreach($aprendizaje as $aprendizaje)
                                        <tr>
                                            <td>{{$aprendizaje->asignatura}}</td>
                                            <td>{{$aprendizaje->nombre}}</td>
                                            <td>{{$aprendizaje->cantidad}}</td>
                                            <td>{{$aprendizaje->socio}}</td>
                                            <td>{{$aprendizaje->año}}</td>
                                            <td>{{$aprendizaje->semestre}}</td>
                                            <td>{{$aprendizaje->evidencia}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('AprendizajeController@edit', $aprendizaje->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('AprendizajeController@destroy', $aprendizaje->id)}}" method="post">
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