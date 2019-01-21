@extends('layouts.master')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Reportes de todas las Actividades de Vinculación</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('aprendizaje.create') }}" class="btn btn-info" >Generar reporte en PDF</a>
                            </div>
                        </div>
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
                                    @foreach($aprendizajes->tags as $aprendizaje)
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
                                    @foreach($convenio->tags as $convenio)
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

                        <div class="table-container">
                            <table id="tablaExt" class="table table-bordred table-striped">
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
                                    @foreach($extension->tags as $extension)
                                        <tr>
                                            <td>{{$extension->titulo}}</td>
                                            <td>{{$extension->nombre}}</td>
                                            <td>{{$extension->fecha}}</td>
                                            <td>{{$extension->lugar}}</td>
                                            <td>{{$extension->cantidad}}</td>
                                            <td>{{$extension->organizador}}</td>
                                            <td>{{$extension->convenio}}</td>
                                            <td>{{$extension->evidencia}}</td>
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

                        <div class="table-container">
                            <table id="tablaTitulac" class="table table-bordred table-striped">
                                <thead>
                                <th>Titulo de la actividad</th>
                                <th>Nombre de estudiante</th>
                                <th>RUT Estudiante</th>
                                <th>Fecha inicio</th>
                                <th>Fecha termino</th>
                                <th>Profesores guia</th>
                                <th>Empresa</th>
                                <th>Evidencia</th>
                                </thead>
                                <tbody>
                                @if($titulacion->count())
                                    @foreach($titulacion->tags as $titulacion)
                                        <tr>
                                            <td>{{$titulacion->titulo_actividad}}</td>
                                            <td>{{$titulacion->nombre_estudiante}}</td>
                                            <td>{{$titulacion->rut}}</td>
                                            <td>{{$titulacion->fecha_inicio}}</td>
                                            <td>{{$titulacion->fecha_fin}}</td>
                                            <td>{{$titulacion->profesor_guia}}</td>
                                            <td>{{$titulacion->empresa}}</td>
                                            <td>{{$titulacion->evidencia}}</td>
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
            </div>
        </section>
    </div>
@endsection