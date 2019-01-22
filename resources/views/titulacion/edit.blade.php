@extends('layouts.master')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Actualizar Actividad de titulacion</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">

                            <form method="POST" action="{{ route('titulacion.update',$titulacion->id) }}"  role="form">
                                {{ csrf_field() }}

                                <input name="_method" type="hidden" value="PATCH">
                                <br>
                                <label for="titulo_actividad">Titulo de la Actividad:</label>
                                <input type="text" name="titulo_actividad" id="titulo_actividad" value="{{$titulacion->titulo_actividad}}"><br>
                                *
                                <label for="cant_estudiantes">Cantidad Estudiantes:</label>
                                <input type="text" name="cant_estudiantes" id="cant_estudiantes" value="{{$titulacion->cant_estudiantes}}">
                                <br>
                                *
                                <label for="nombre_estudiante">Nombre del estudiante:</label>
                                <input type="text" name="nombre_estudiante" id="nombre_estudiante" value="{{$titulacion->nombre_estudiante}}"><br>
                                *
                                <label for="rut">Rut del estudiante:</label>
                                <input type="text" name="rut" id="rut" value="{{$titulacion->rut}}"><br>
                                 <label for="carrera">Carrera:</label>
                                <input type="text" name="carrera" id="carrera" value="{{$titulacion->carrera}}"><br>
                                *
                                <label for="fecha_inicio">Fecha de Inicio:</label>
                                <input type="date" name="fecha_inicio"value="{{$titulacion->fecha_inicio}}"><br>

                                <label for="fecha_fin">Fecha de Termino:</label>
                                <input type="date" name="fecha_fin"value="{{$titulacion->fecha_fin}}"><br>
                                *
                                <label for="cant_prof_guia">Cantidad Profesores guias:</label>
                                <input type="text" name="cant_prof_guia" id="cant_prof_guia" value="{{$titulacion->cant_prof_guia}}">
                                <br>
                                *
                                <label for="prof_guia">Nombre del Profesor Guia:</label>
                                <input type="text" name="prof_guia" id="prof_guia" value="{{$titulacion->prof_guia}}"><br>
                                *
                                <label for="empresa">Nombre de la empresa:</label>
                                <input type="text" name="empresa" id="empresa" value="{{$titulacion->empresa}}"><br>
                                *
                                <label for="evidencia">Formulario de Inscripcion:</label>
                                <input type="file" name="evidencia" accept=".pdf, .png, .jpg, .jpeg"value="{{$titulacion->evidencia}}">
                                <br>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                    <a href="{{ route('titulacion.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection