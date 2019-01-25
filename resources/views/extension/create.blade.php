@extends('layouts.master')

@section('title', "Registrar Actividad de Extensión")

@section('content')
    <h1 class = "page-header">Registrar Actividad de Extensión</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ url('extension') }}">
        {{ csrf_field() }}
        * Campos obligatorios
        <br>
        <label for="titulo">*Nombre de la actividad:</label>
        <input type="text" name="titulo" id="titulo" placeholder="Charla de RV">
        <div class="form-group">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <label for="nombre"><th>*Nombre del expositor:</th></label>
                </tr>
                <tr>
                    <td><input type="text" name="nombre[]" id="nombre" placeholder="Juan Perez" class="form-control name_list"></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Añadir otro expositor</button></td>
                </tr>
            </table>
        </div>
        <label for="fecha">* Fecha de la actividad: </label>
        <input type="date" name="fecha">
        <br>
        <label for="lugar">* Lugar de la actividad:</label>
        <input type="text" name="lugar" id="lugar" placeholder="Antofagasta">
        <br>
        <label for="cantidad">* Cantidad de participantes:</label>
        <input type="text" name="cantidad" id="cantidad">
        <div class="form-group">
            <table class="table table-bordered" id="profesores">
                <tr>
                    <label for="organizador"><th>*Nombre del organizador:</th></label>
                </tr>
                <tr>
                    <td><input type="text" name="organizador[]" id="organizador" placeholder="Pedro Perez" class="form-control name_list"></td>
                    <td><button type="button" name="add" id="add2" class="btn btn-success">Añadir otro organizador</button></td>
                </tr>
            </table>
        </div>
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
        <input type="radio" name="tipo_convenio" value="ninguno"> Ninguno
        <br>
        <label for="evidencia">*Evidencia de la actividad:</label>
        <input type="file" name="evidencia[]" accept=".pdf, .png, .jpg, .jpeg" multiple>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Registrar" class="btn btn-success btn-block" style="height:40px; width:100px">
            <a href="{{ route('convenio.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            var i = 1;
            var j = 1;
            $('#add').click(function () {
                if(i<=3){
                    i++;
                    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="nombre[]" id="nombre" placeholder="Juan Perez" class="form-control name_list"></td><td><button name="remove" id="'+i+'" class="btn btn_remove">X</button></td></tr>');
                }
            });
            $('#add2').click(function () {
                if(j<=1){
                    j++;
                    $('#profesores').append('<tr id="row2'+i+'"><td><input type="text" name="organizador[]" id="organizador" placeholder="Pedro Perez" class="form-control name_list"></td><td><button name="remove" id="'+i+'" class="btn btn_remov">X</button></td></tr>');
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