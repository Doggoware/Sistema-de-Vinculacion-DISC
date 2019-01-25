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
                        <div class="pull-left"><h3>Lista Indicadores Definidos</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('indicadores.create') }}" class="btn btn-info" >Añadir indicadores</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre del indicador</th>
                                <th>Descripción del indicador</th>
                                <th>Formula del indicador</th>
                                <th>Tipo de evidencia</th>
                                <th>Fecha de vigencia</th>
                                <th>Objetivos</th>
                                <th>Actual</th>
                                </thead>
                                <tbody>
                                @if($indicadores->count())
                                    @foreach($indicadores as $indicador)
                                        <tr>
                                            <td>{{$indicador->nombre}}</td>
                                            <td>{{$indicador->descripcion}}</td>
                                            <td>{{$indicador->formula}}</td>
                                            <td>{{$indicador->evidencia}}</td>
                                            <td>{{$indicador->fecha}}</td>
                                            <td>{{$indicador->objetivo}}</td>
                                            <td
                                            @if($indicador->objetivo>$indicador->actual)
                                                {{$color = "red"}}
                                                    @else
                                                {{$color = "green"}}
                                                    @endif><span style="color: {{$color}};">{{$indicador->actual}}</span></td>
                                            @if($loop->iteration >= 6)
                                                <td><a class="btn btn-primary btn-xs" href="{{action('IndicadoresController@edit', $indicador->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                <td>
                                                    <form action="{{action('IndicadoresController@destroy', $indicador->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                    </form>
                                                </td>
                                            @endif
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
                    {{ $indicadores->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection