@extends('layouts.master')

@section('title', "Registrar Titulados")

@section('content')
    <h1 class="page-header">Registrar Titulado</h1>

    <form method="POST" action="{{ url('titulados') }}">
        {{ csrf_field() }}
        * Campos obligatorios
        <br>
        <label for="nombre_titulado">* Nombre del titulado:</label>
        <input type="text" name="nombre_titulado" id="nombre_titulado" placeholder="Juan Perez">
        <br>
        <label for="rut_titulado">* RUT del titulado:</label>
        <input type="text" name="rut_titulado" id="rut_titulado" placeholder="12345678-9">
        <br>
        <label for="telefono_titulado">Teléfono del titulado:</label>
        <input type="text" name="telefono_titulado" id="telefono_titulado" placeholder="87654321">
        <br>
        <label for="correo_titulado">Correo del titulado:</label>
        <input type="text" name="correo_titulado" id="correo_titulado" placeholder="jperez@placeholder.com">
        <br>
        <label for="empresa_trabaja">Empresa donde trabaja:</label>
        <input type="text" name="empresa_trabaja" id="empresa_trabaja" placeholder="Doggoware">
        <br>
        <label for="anio_titulacion">* Año de titulacion:</label>
        <input type="text" name="anio_titulacion", id="anio_titulacion">
        <br>
        <label for="carrera">* Carrera:</label>
        <input type="text" name="carrera" id="carrera">
        <br>
        <button type="submit">Registrar Titulado</button>
    </form>
@endsection