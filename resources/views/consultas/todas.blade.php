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
                        <a href="{{ route('consultas.index') }}" class="btn btn-info btn-sm pull-right" >Atrás</a>
                        <a href="/todas?aprendizaje=Actividades de aprendizaje">Actividades de aprendizaje</a><br/>
                        <a href="/todas?extension=Actividades de extension">Actividades de extension</a><br/>
                        <a href="/todas?convenio=Actividades de convenio">Actividades de convenio</a><br/>
                        <a href="/todas?titulacion=Actividades de titulacion">Actividades de titulacion</a><br/>
                        <a href="/todas?all=all">Todas</a><br/>


                        @if($extension->count())
                        <div class="pull-left"><h3>Actividades de extension</h3></div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordered table-striped">
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
                                    @foreach($extension as $extension)
                                        <tr>
                                            <td>{{$extension->titulo}}</td>
                                            <td>{{$extension->nombre}}</td>
                                            <td>{{$extension->fecha}}</td>
                                            <td>{{$extension->lugar}}</td>
                                            <td>{{$extension->cantidad}}</td>
                                            <td>{{$extension->organizador}}</td>
                                            <td>{{$extension->tipo_convenio}}</td>
                                            <td>{{$extension->evidencia}}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

                        @if($aprendizajes->count())
                        <div class="pull-left"><h3>Actividades de aprendizaje</h3></div>
                        <div class="table-container">
                            <table id="tablaApren" class="table table-bordered table-striped">
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
                        @endif

                        @if($convenio->count())
                        <div class="pull-left"><h3>Convenios de Colaboración</h3></div>
                        <div class="table-container">
                            <table id="tablaConv" class="table table-bordered table-striped">
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
                        @endif

                        @if($titulacion->count())
                        <div class="pull-left"><h3>Actividades de titulacion</h3></div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordered table-striped">
                                <thead>
                                <th>Titulo Actividad</th>
                                <th>Nombre de estudiante</th>
                                <th>Rut del estudiante</th>
                                <th>Carrera del estudiante</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de termino</th>
                                <th>Profesor guía</th>
                                <th>Empresa</th>
                                <th>Evidencia</th>
                                </thead>
                                <tbody>
                                @if($titulacion->count())
                                    @foreach($titulacion as $titu)
                                        <tr>
                                            <td>{{$titu->titulo_actividad}}</td>
                                            <td>{{$titu->nombre_estudiante}}</td>
                                            <td>{{$titu->rut}}</td>
                                            <td>{{$titu->carrera}}</td>
                                            <td>{{$titu->fecha_inicio}}</td>
                                            <td>{{$titu->fecha_fin}}</td>
                                            <td>{{$titu->prof_guia}}</td>
                                            <td>{{$titu->empresa}}</td>
                                            <td>{{$titu->evidencia}}</td>

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
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection