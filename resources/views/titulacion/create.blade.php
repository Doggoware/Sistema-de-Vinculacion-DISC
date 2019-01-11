@extends('layouts.master')

@section('title', "Registrar Actividad de Titulación por Convenio")

@section('content')

    <form method="POST" enctype="multipart/form-data" action="{{ url('titulacion') }}">
        {{ csrf_field() }}
        <h1 class = "page-header">Registrar Actividad de Titulación por Convenio</h1>
        * Campos obligatorios
        <br>
        <label for="titulo_actividad">Titulo de la Actividad:</label>
        <input type="text" name="titulo_actividad" id="titulo_actividad" placeholder="Titulo de Actividad"><br>
        *
        <label for="cant_estudiantes">Cantidad Estudiantes:</label>
        <input type="text" name="cant_estudiantes" id="cant_estudiantes" placeholder="1 o más">
        <br>
        *
        <label for="nombre_estudiante">Nombre del estudiante:</label>
        <input type="text" name="nombre_estudiante" id="nombre_estudiante" placeholder="Juan Perez"><br>
        *
        <label for="rut">Rut del estudiante:</label>
        <input type="text" name="rut" id="rut" placeholder="12.345.678-9"><br>
        *
        <label for="carrera">Carrera:</label>
        <input type="text" name="carrera" id="carrera" placeholder="ICCI"><br>
        *
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio"><br>

        <label for="fecha_fin">Fecha de Termino:</label>
        <input type="date" name="fecha_fin"><br>
        *
        <label for="cant_prof_guia">Cantidad Profesores guias:</label>
        <input type="text" name="cant_prof_guia" id="cant_prof_guia" placeholder="1 o más">
        <br>
        *
        <label for="prof_guia">Nombre del Profesor Guia:</label>
        <input type="text" name="prof_guia" id="prof_guia" placeholder="Juan Perez"><br>
        *
        <label for="empresa">Nombre de la empresa:</label>
        <input type="text" name="empresa" id="empresa" placeholder="Codelco"><br>
        *
        <label for="evidencia">Formulario de Inscripcion:</label>
        <input type="file" name="evidencia" accept=".pdf, .png, .jpg, .jpeg">
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Registrar" class="btn btn-success btn-block">
            <a href="{{ route('titulacion.index') }}" class="btn btn-info btn-block" >Atrás</a>
        </div>
    </form>
@endsection