@extends('layouts.master')

@section('content')
    <h1>Registrar Actividad de Aprendizaje + Servicio</h1>

    <form method="POST" action="{{ url('aprendizaje') }}">
        {{ csrf_field() }}
        * Campos obligatorios
        <br>
        <label for="asignatura">Nombre de la asignatura:</label>
        <input type="text" name="asignatura" id="asignatura" placeholder="Asignatura">
        *
        <br>
        <label for="nombre">Nombre del profesor:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Juan Perez">
        *
        <br>
        <label for="cantidad">Cantidad Estudiantes:</label>
        <input type="text" name="cantidad" id="cantidad">
        *
        <br>
        <label for="socio">Nombre del Socio Comunitario:</label>
        <input type="text" name="socio" id="socio" placeholder="Diego Perez">
        *
        <br>
        <laber for="año">Año:</laber>
        <input type="text" name="año", id="año">
        *
        <br>
        <label for="semestre">Semestre:</label>
        <input type="text" name="semestre" id="semestre" placeholder="1 ó 2">
        *
        <br>
        <label for="evidencia">Listado de participantes:*</label>
        <input type="file" name="evidencia" accept=".pdf, .png, .jpg, .jpeg">
        <br>
        <button type="submit">Registrar Actividad</button>
    </form>
@endsection