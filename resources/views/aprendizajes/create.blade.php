@extends('layouts.master')

@section('title', "Registrar Actividad de Aprendizaje + Servicio")

@section('content')
    <form method="POST" action="{{ url('aprendizaje') }}">
        {{ csrf_field() }}
        <h3>Registrar Actividad de Aprendizaje + Servicio</h3>
        <br>
        <div class="form-group row">
            <label for="asignatura" class="col-sm-5 col-form-label">Nombre de la asignatura</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="asignatura" id="asignatura" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-5 col-form-label">Nombre del profesor(a)</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="nombre" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="cantidad" class="col-sm-5 col-form-label">Cantidad de estudiantes</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" name="cantidad" id="cantidad" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="socio" class="col-sm-5 col-form-label">Nombre del socio comunitario</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="socio" id="socio" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="año" class="col-sm-5 col-form-label">Año</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" name="año" id="año" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="semestre" class="col-sm-5 col-form-label">Semestre</label>
            <div class="col-sm-7 text-left">
                <input type="radio" name="semestre" value="1"> Primer Semestre<br>
                <input type="radio" name="semestre" value="2"> Segundo Semestre<br>
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Button</button>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
            </div>
        </div>

        <div class="jumbotron text-center" >
            <button type="submit" class="btn btn-primary btn-lg">Registrar A+S</button>
        </div>
    </form>
@endsection
