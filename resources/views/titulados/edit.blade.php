@extends('layouts.master')

@section('title', "Editar Titulado")

@section('content')
    <h1 class="page-header">Editar Titulado</h1>

    <form method="POST" action="{{ url('titulados') }}">
        {{ csrf_field() }}
        * Campos obligatorios
        <br>
        <label for="nombre_titulado">* Nombre del titulado:</label>
        <input type="text" name="nombre_titulado" id="nombre_titulado" placeholder="Juan Perez" value="{{old('nombre_titulado',nombre_titulado)}}">
        <br>
        <label for="rut_titulado">* RUT del titulado:</label>
        <input type="text" name="rut_titulado" id="rut_titulado" placeholder="11.111.111-1" value="{{old('rut_titulado', $titulados->rut_titulado)}}">
        <br>
        <label for="telefono_titulado">Teléfono del titulado:</label>
        <input type="text" name="telefono_titulado" id="telefono_titulado" placeholder="87654321"value="{{old('telefono_titulado', $titulados->telefono_titulado)}}">
        <br>
        <label for="correo_titulado">Correo del titulado:</label>
        <input type="text" name="correo_titulado" id="correo_titulado" placeholder="jperez@placeholder.com"value="{{old('correo_titulado', $titulados->correo_titulado)}}">
        <br>
        <label for="empresa_trabaja">Empresa donde trabaja:</label>
        <input type="text" name="empresa_trabaja" id="empresa_trabaja" placeholder="Doggoware"value="{{old('empresa_trabaja', $titulados->empresa_trabaja)}}">
        <br>
        <label for="anio_titulacion">* Año de titulacion:</label>
        <input type="text" name="anio_titulacion", id="anio_titulacion"value="{{old('anio_titulacion', $titulados->anio_titulacion)}}">
        <br>
        <label for="carrera">* Carrera:</label>
        <input type="text" name="carrera" id="carrera"value="{{old('carrera', $titulados->carrera)}}">
        <br>
        <button type="submit">Registrar Titulado</button>
    </form>
@endsection