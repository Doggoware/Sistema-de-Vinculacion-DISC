@extends('layouts.master')

@section('title', "Registrar Actividad de Extensión")

@section('content')
    <h1 class = "page-header">Registrar Actividad de Extensión</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ url('extension') }}">
        {{ csrf_field() }}

        <div class="row">
            <div class="col">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="titulo" class="col-sm-5 col-form-label">Nombre de la Actividad</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="titulo" id="titulo" value="{{old('titutlo')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="nombre" class="col-sm-5 col-form-label">Nombre del expositor</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha" class="col-sm-5 col-form-label">Fecha de la actividad</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="lugar" class="col-sm-5 col-form-label">Lugar de actividad</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="lugar" id="lugar" value="{{old('lugar')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="cantidad" class="col-sm-5 col-form-label">Cantidad de participantes</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" name="cantidad" id="cantidad" value="{{old('cantidad')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="organizador" class="col-sm-5 col-form-label">Nombre del organizador</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="organizador" id="organizador" value="{{old('organizador')}}" required>
            </div>
        </div>


        <div class="form-group row">
            <label for="tipo_convenio" class="col-sm-5 col-form-label">¿A que tioi de convenioo pertenece?</label>
            <div class="col-sm-7">
                <input type="radio" name="tipo_convenio" value="capstone"> Capstone
                <br>
                <input type="radio" name="tipo_convenio" value="marco"> Marco
                <br>
                <input type="radio" name="tipo_convenio" value="especifico"> Especifico
                <br>
                <input type="radio" name="tipo_convenio" value="as"> A+S
                <br>
                <input type="radio" name="tipo_convenio" value="" checked> Ninguno
            </div>
        </div>

        <div class="form-group row">
            <label for="evidencia" class="col-sm-5 col-form-label">Listado de participantes</label>
            <div class="col-sm-7">
                <input type="file" name="evidencia[]" accept=".pdf, .png, .jpg, .jpeg" multiple>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Registrar" class="btn btn-success btn-block">
            <a href="{{ route('convenio.index') }}" class="btn btn-info btn-block" >Atrás</a>
        </div>
    </form>
@endsection
