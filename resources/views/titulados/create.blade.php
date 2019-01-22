@extends('layouts.master')

@section('title', "Registrar Titulados")

@section('content')
    <h1 class="page-header">Registrar Titulado</h1>

    <form method="POST" action="{{ url('titulados') }}">
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
            <label for="nombre_titulado" class="col-sm-5 col-form-label">Nombre del titulado</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="nombre_titulado" id="nombre_titulado" value="{{old('nombre_tiutlado')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="rut_titulado" class="col-sm-5 col-form-label">Run del titulado</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="rut_titulado" id="rut_titulado" value="{{old('rut_titulado')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="telefono_titulado" class="col-sm-5 col-form-label">Telefono</label>
            <div class="col-sm-7">
                <input type="tel" class="form-control" name="telefono_titulado" id="telefono_titulado" value="{{old('telefono_titulado')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="correo_titulado" class="col-sm-5 col-form-label">Correo</label>
            <div class="col-sm-7">
                <input type="email" class="form-control" name="correo_titulado" id="correo_titulado" value="{{old('correo_titulado')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="empresa_trabaja" class="col-sm-5 col-form-label">Nombre de la empresa</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="empresa_trabaja" id="empresa_trabaja" value="{{old('empresa_trabaja')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="anio_titulacion" class="col-sm-5 col-form-label">Año de tiutalacion</label>
            <div class="col-sm-7">
                <input type="number" class="form-control" name="anio_titulacion" id="anio_titulacion" value="{{old('anio_titulacion')}}" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="carrera" class="col-sm-5 col-form-label">Carrera</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="carrera" id="carrera" value="{{old("carrera")}}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Registrar" class="btn btn-success btn-block">
            <a href="{{ route('titulados.index') }}" class="btn btn-info btn-block" >Atrás</a>
        </div>
    </form>
@endsection
