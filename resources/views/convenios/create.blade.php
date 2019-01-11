@extends('layouts.master')

@section('title', "Registrar Convenios de Colaboración")

@section('content')
    <h1 class = "page-header">Registrar Convenios de Colaboración</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ url('convenio') }}">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="nombre_empresa" class="col-sm-5 col-form-label">Nombre de la emopresa</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="tipo_convenio" class="col-sm-5 col-form-label">Seleccione al menos un tipo de Convenio</label>
            <div class="col-sm-7">
                <br>
                <input type="checkbox" name="tipo_convenio[]" value="capstone" class="group-required" checked> Capstone<br>
                <input type="checkbox" name="tipo_convenio[]" value="marco"> Marco<br>
                <input type="checkbox" name="tipo_convenio[]" value="especifico"> Especifico<br>
                <input type="checkbox" name="tipo_convenio[]" value="as"> A+S
                <br>
            </div>
        </div>


        <div class="form-group row">
            <label for="fecha_inicio" class="col-sm-5 col-form-label">Fecha de inicio</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="fecha_inicio" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha_termino" class="col-sm-5 col-form-label">Fecha de termino</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="fecha_termino" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="evidencia" class="col-sm-5 col-form-label">Evidencia de la actividad</label>
            <div class="col-sm-7">
                <input type="file" name="evidencia" accept=".pdf">
            </div>
        </div>

        <div class="container text-center">
            <button type="submit" class="text-center">Registrar Convenio</button>
        </div>


    </form>
@endsection
