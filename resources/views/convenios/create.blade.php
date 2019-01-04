@extends('layouts.master')

@section('content')
    <h1>Registrar Convenios de Colaboración</h1>

    <form method="POST" action="{{ url('convenio') }}">
        {{ csrf_field() }}
        * campos obligatorios.
        <br>
        <label for="nombre_empresa">Nombre Empresa:</label>
        <input type="text" name="nombre_empresa" id="nombre_empresa" placeholder="Arcos Dorados">
        *
        <br>
        <label for="tipo_convenio">Tipo de Convenio:</label>
        *
        <br>
        <input type="checkbox" name="tipo_convenio" value="capstone" checked> Capstone<br>
        <input type="checkbox" name="tipo_convenio" value="marco"> Marco<br>
        <input type="checkbox" name="tipo_convenio" value="especifico"> Especifico<br>
        <input type="checkbox" name="tipo_convenio" value="as"> A+S
        <br>
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio">
        *
        <br>
        <label for="fecha_termino">Fecha de Termino:</label>
        <input type="date" name="fecha_termino">
        *
        <br>
        <label for="evidencia">Evidencia de la actividad:*</label>
        <input type="file" name="evidencia" accept=".pdf">
        <br>
        <button type="submit">Registrar Convenio</button>
    </form>
@endsection