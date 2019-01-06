@extends('layouts.master')

@section('title', "Registrar Actividad de Aprendizaje + Servicio")

@section('content')
    <h1 class = "page-header">Registrar Actividad de Aprendizaje + Servicio</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ url('aprendizaje') }}">
        {{ csrf_field() }}
        * Campos obligatorios
        <br>
        <label for="asignatura">* Nombre de la asignatura:</label>
        <input type="text" name="asignatura" id="asignatura" placeholder="Asignatura">
        <br>
        <label for="nombre">* Nombre del profesor:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Juan Perez">
        <br>
        <label for="cantidad">* Cantidad Estudiantes:</label>
        <input type="text" name="cantidad" id="cantidad">
        <br>
        <label for="socio">* Nombre del Socio Comunitario:</label>
        <input type="text" name="socio" id="socio" placeholder="Diego Perez">
        <br>
        <label for="año">* Año:</label>
        <input type="text" name="año", id="año">
        <br>
        <label for="semestre">* Semestre:</label>
        <br>
        <input type="radio" name="semestre" value="1"> Primer Semestre<br>
        <input type="radio" name="semestre" value="2"> Segundo Semestre<br>
        <br>
        <label for="evidencia">*Listado de participantes:*</label>
        <input type="file" name="evidencia" accept=".pdf, .png, .jpg, .jpeg">
        <br>
        <button type="submit">Registrar Actividad</button>
    </form>
@endsection