@extends('layouts.master')

@section('content')

    <div class="row">

        <section class="content">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="pull-center"><h1>Lista de actividades</h1></div>
                        <div class="pull-right">
                            <a href="{{action('ConsultaController@pdf')}}" class="btn btn-sm btn-primary">
                                Descargar archivo listadoActividades.pdf
                            </a>
                        </div>

                        <div class="pull-left"><h3>Actividades de extension</h3></div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre de la actividad</th>
                                <th>Nombre del expositor</th>
                                <th>Fecha de la actividad</th>
                                <th>Lugar de la actividad</th>
                                <th>Cantidad de participantes</th>
                                <th>Nombre del organizador</th>
                                <th>Tipo de convenio</th>
                                <th>Evidencia</th>
                                </thead>
                                <tbody>
                                @if($extension->count())
                                    @foreach($extension as $extension)
                                        <tr>
                                            <td>{{$extension->titulo}}</td>
                                            <td>{{$extension->nombre}}</td>
                                            <td>{{$extension->fecha}}</td>
                                            <td>{{$extension->lugar}}</td>
                                            <td>{{$extension->cantidad}}</td>
                                            <td>{{$extension->organizador}}</td>
                                            <td>{{$extension->convenio}}</td>
                                            <td>{{$extension->evidencia}}</td>
                                            <
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
                        <div class="pull-left"><h3>Actividades de aprendizaje</h3></div>
                        <div class="table-container">
                            <table id="tablaApren" class="table table-bordred table-striped">
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
                                @if($aprendizajes->count())
                                    @foreach($aprendizajes as $aprendizaje)
                                        <tr>
                                            <td>{{$aprendizaje->asignatura}}</td>
                                            <td>{{$aprendizaje->nombre}}</td>
                                            <td>{{$aprendizaje->cantidad}}</td>
                                            <td>{{$aprendizaje->socio}}</td>
                                            <td>{{$aprendizaje->año}}</td>
                                            <td>{{$aprendizaje->semestre}}</td>
                                            <td>{{$aprendizaje->evidencia}}</td>
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
                        <div class="pull-left"><h3>Convenios de Colaboración</h3></div>
                        <div class="table-container">
                            <table id="tablaConv" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre Empresa</th>
                                <th>Tipo de convenio</th>
                                <th>Fecha inicio</th>
                                <th>Fecha termino</th>
                                <th>Evidencia</th>
                                </thead>
                                <tbody>
                                @if($convenio->count())
                                    @foreach($convenio as $convenio)
                                        <tr>
                                            <td>{{$convenio->nombre_empresa}}</td>
                                            <td>{{$convenio->tipo_convenio}}</td>
                                            <td>{{$convenio->fecha_inicio}}</td>
                                            <td>{{$convenio->fecha_termino}}</td>
                                            <td>{{$convenio->evidencia}}</td>
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