@extends('layouts.master')

@section('content')
    <h3>Registrar Actividad de Aprendizaje + Servicio</h3>

    <form method="POST" action="{{ url('aprendizaje') }}">
        {{ csrf_field() }}
        <br>
        <label for="asignatura">Nombre de la asignatura:</label>
        <input type="text" name="asignatura" id="asignatura" placeholder="Asignatura" required>
        <small id="advertencia_asignatura" class="form-text text-muted"> Hola </small>
        <br>
        <label for="nombre">Nombre del profesor:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Juan Perez" required>
        <br>
        <label for="cantidad">Cantidad Estudiantes:</label>
        <input type="text" name="cantidad" id="cantidad" required>

        <br>
        <label for="socio">Nombre del Socio Comunitario:</label>
        <input type="text" name="socio" id="socio" placeholder="Diego Perez" required>

        <br>
        <label for="año">Año:</label>
        <input type="text" name="año", id="año" required>

        <br>
        <label for="semestre">Semestre:</label>
        <input type="text" name="semestre" id="semestre" placeholder="1 ó 2" required>

        <br>
        <label for="evidencia">Listado de participantes:</label>
        <input type="file" name="evidencia" accept=".pdf, .png, .jpg, .jpeg">
        <br>
        <button type="submit">Registrar Actividad</button>
    </form>
@endsection
