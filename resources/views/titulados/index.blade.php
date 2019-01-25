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
                                <a href="{{ route('titulados.create') }}" class="btn btn-info" >Añadir Titulado</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
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
                                            <td><a class="btn btn-primary btn-xs" href="{{action('TituladosController@edit', $titulado->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('TituladosController@destroy', $titulado->id)}}" method="post">
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
                    {{ $titulados->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection