@extends('layouts.master')

@section('title', "Registrar Actividad de Titulación por Convenio")

@section('content')

    <form method="POST" enctype="multipart/form-data" action="{{ url('titulacion') }}">
        {{ csrf_field() }}

        <h1 class = "page-header">Registrar Actividad de Titulación por Convenio</h1>

        <div class="form-group row">
            <label for="titulo_actividad" class="col-sm-5 col-form-label">Titulo de la Actividad</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="titulo_actividad" id="titulo_actividad" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="cant_estudiantes" class="col-sm-5 col-form-label">Cantidad de Estudiantes</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" name="cant_estudiantes" id="cant_estudiantes" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="nombre_estudiante" class="col-sm-5 col-form-label">Nombre del Estudiante</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="nombre_estudiante" id="nombre_estudiante" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="rut" class="col-sm-5 col-form-label">Run del estudiante</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="rut" id="rut" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="carrera" class="col-sm-5 col-form-label">Carrera</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="carrera" id="carrera" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha_inicio" class="col-sm-5 col-form-label">Fecha de inicio</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha_fin" class="col-sm-5 col-form-label">Fecha de termino</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="cant_prof_guia" class="col-sm-5 col-form-label">Cantidad de profesores guia</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" name="cant_prof_guia" id="cant_prof_guia" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="prof_guia" class="col-sm-5 col-form-label">Nombre del profesor guia</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="nombre_estudiante" id="nombre_estudiante" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="empresa" class="col-sm-5 col-form-label">Nombre de la empresa</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="empresa" id="empresa" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="evidencia" class="col-sm-5 col-form-label">Formulario de Inscripcion</label>
            <div class="col-sm-7">
                <input type="file" name="evidencia" accept=".pdf, .png, .jpg, .jpeg">
            </div>
        </div>

        <div class="col-xs-6 col-sm-12 col-md-12 col-lg-12" >
            <input type="submit"  value="Registrar" class="btn btn-success btn-block">
            <a href="{{ route('titulacion.index') }}" class="btn btn-info btn-block" >Atrás</a>
        </div>
    </form>
@endsection
