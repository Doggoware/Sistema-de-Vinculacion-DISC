@extends('layouts.master')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Indicadores</h3></div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Formula</th>
                                <th>Evidencia</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Objetivo</th>
                                </thead>
                                <tbody>
                                @if($indicadores->count())
                                    @foreach($indicadores as $indicador)
                                        <tr>
                                            <td>{{$indicador->nombre}}</td>
                                            <td>{{$indicador->descripcion}}</td>
                                            <td>{{$indicador->formula}}</td>
                                            <td>{{$indicador->evidencia}}</td>
                                            <td>{{$indicador->fecha_inicio}}</td>
                                            <td>{{$indicador->fecha_fin}}</td>
                                            <td>{{$indicador->objetivo}}</td>
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