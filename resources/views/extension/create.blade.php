@extends('layouts.master')

@section('content')
    <h1>Registrar Actividad de Extensión</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ url('extension') }}">
        {{ csrf_field() }}
        * Campos obligatorios
        <br>
        <label for="titulo">Nombre de la actividad:</label>
        <input type="text" name="titulo" id="titulo" placeholder="Charla de RV">
        *
        <br>
        <label for="nombre">Nombre del expositor:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Juan Perez">
        *
        <br>
        <label for="fecha">Fecha de la actividad:*</label>
        <input type="date" name="fecha">
        <br>
        <label for="lugar">Lugar de la actividad:</label>
        <input type="text" name="lugar" id="lugar" placeholder="Antofagasta">
        *
        <br>
        <label for="cantidad">Cantidad de participantes:</label>
        <input type="text" name="cantidad" id="cantidad">
        *
        <br>
        <label for="organizador">Nombre del organizador:</label>
        <input type="text" name="organizador" id="organizador" placeholder="Pedro Perez">
        *
        <br>
        <label for="tipo_convenio">¿A qué convenio pertenece?</label>
        <br>
        <input type="radio" name="tipo_convenio" value="capstone" checked> Capstone
        <br>
        <input type="radio" name="tipo_convenio" value="marco"> Marco
        <br>
        <input type="radio" name="tipo_convenio" value="especifico"> Especifico
        <br>
        <input type="radio" name="tipo_convenio" value="as"> A+S
        <br>
        <input type="radio" name="tipo_convenio" value=""> Ninguno
        <br>
        <label for="evidencia">Evidencia de la participacion:*</label>
        <input type="file" name="evidencia[]" accept=".pdf, .png, .jpg, .jpeg" multiple>
        <br>
        <button type="submit">Registrar Actividad</button>
    </form>
@endsection