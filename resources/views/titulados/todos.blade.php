@extends('layouts.master')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Titulados</h3></div>
                        <div class="pull-right">
                            <a href="{{action('TituladosController@pdf')}}" class="btn btn-sm btn-primary">
                                Descargar archivo titulados.pdf
                            </a>
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
                                @if($titulado->count())
                                    @foreach($titulado as $titulado)
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