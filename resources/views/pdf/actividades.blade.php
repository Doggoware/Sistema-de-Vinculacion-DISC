@extends('layout')

@section('content')
    <div class="pull-left"><h3>Actividades de extension</h3></div><br/><br/>
        <table id="mytable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nombre de la actividad</th>
                <th>Nombre del expositor</th>
                <th>Fecha de la actividad</th>
                <th>Lugar de la actividad</th>
                <th>Cantidad de participantes</th>
                <th>Nombre del organizador</th>
                <th>Tipo de convenio</th>
                <th>Evidencia</th>
            </tr>
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
                        <td>{{$extension->tipo_convenio}}</td>
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


        <div class="pull-left"><h3>Actividades de aprendizaje</h3></div><br/><br/>
        <div class="table-container">
            <table id="tablaApren" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Nombre de la asignatura</th>
                <th>Nombre del profesor</th>
                <th>Cantidad de estudiantes</th>
                <th>Nombre del socio comunitario</th>
                <th>Año</th>
                <th>Semestre</th>
                <th>Listado de participantes</th>
                </tr>
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


        <div class="pull-left"><h3>Convenios de Colaboración</h3></div><br/><br/>
        <div class="table-container">
            <table id="tablaConv" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Nombre Empresa</th>
                <th>Tipo de convenio</th>
                <th>Fecha inicio</th>
                <th>Fecha termino</th>
                <th>Evidencia</th>
                </tr>
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

    <div class="pull-left"><h3>Actividades de titulacion</h3></div><br/><br/>
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
@endsection