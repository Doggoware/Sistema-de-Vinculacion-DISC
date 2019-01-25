@extends('layouts.master')

@section('title', "Registrar Actividad de Titulación por Convenio")

@section('content')

    <form method="POST" enctype="multipart/form-data" action="{{ url('titulacion') }}">
        {{ csrf_field() }}
        <h1 class = "page-header">Registrar Actividad de Titulación por Convenio</h1>
        * Campos obligatorios
        <br>
        *
        <label for="titulo">Titulo de la Actividad:</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo de Actividad"><br>

        <div class="form-group">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <label for="nombre_estudiante"><th>Nombre del estudiante:</th></label>
                    <label for="rut"><th>Rut del estudiante:</th></label>
                    <label for="carrera"><th>Carrera:</th></label>
                </tr>
                <tr>
                    <td><input type="text" name="nombre_estudiante[]" id="nombre_estudiante" placeholder="Juan Perez" class="form-control name_list"></td>
                    <td><input type="text" name="rut[]" id="rut" placeholder="12.345.678-9" class="form-control name_list"></td>
                    <td><select name="carrera[]" id="carrera">@foreach($carrera as $carr => $value)<option value="{{$value}}">{{$value}}</option>@endforeach</select></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Añadir otro estudiante</button></td>
                </tr>
            </table>
        </div>
        *
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio"><br>
        *
        <label for="fecha_fin">Fecha de Termino:</label>
        <input type="date" name="fecha_fin"><br>

        <div class="form-group">
            <table class="table table-bordered" id="profesores">
                <tr>
                    <label for="prof_guia"><th>Nombre del Profesor Guia:</th></label>
                </tr>
                <tr>
                    <td><select name="prof_guia[]" id="prof_guia">@foreach($items as $item => $value)<option value="{{$value}}">{{$value}}</option>@endforeach</select></td>
                    <td><button type="button" name="add" id="add2" class="btn btn-success">Añadir otro profesor</button></td>
                </tr>
            </table>
        </div>
        *
        <label for="empresa">Nombre de la empresa:</label>
        <select name="empresa" id="empresa">
            @foreach($empresa as $empre => $value)
                <option value="{{$value}}">
                    {{$value}}
                </option>
            @endforeach
        </select>
        <br>
        *
        <label for="evidencia">Formulario de Inscripcion:</label>
        <input type="file" name="evidencia" accept=".pdf, .png, .jpg, .jpeg">
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Registrar" class="btn btn-success btn-block" style="height:40px; width:100px">
            <a href="{{ route('titulacion.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            var i = 1;
            var j = 1;
            $('#add').click(function () {
                if(i<=3){
                    i++;
                    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="nombre_estudiante[]" id="nombre_estudiante" placeholder="Juan Perez" class="form-control name_list"></td><td><input type="text" name="rut[]" id="rut" placeholder="12.345.678-9" class="form-control name_list"></td><td><select name="carrera[]" id="carrera">@foreach($carrera as $carr => $value)<option value="{{$value}}">{{$value}}</option>@endforeach</select></td><td><button name="remove" id="'+i+'" class="btn btn_remove" type="button">X</button></td></tr>');
                }
            });
            $('#add2').click(function () {
                if(j<=1){
                    j++;
                    $('#profesores').append('<tr id="row2'+i+'"><td><select name="prof_guia[]" id="prof_guia">@foreach($items as $item => $value)<option value="{{$value}}">{{$value}}</option>@endforeach</select></td><td><button name="remove" id="'+i+'" class="btn btn_remov" type="button">X</button></td></tr>');
                }
            });
            $(document).on('click', '.btn_remove', function (){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
                i--;
            });
            $(document).on('click', '.btn_remov', function (){
                var button_id = $(this).attr("id");
                $('#row2'+button_id+'').remove();
                j--;
            });
        });
    </script>

@endsection