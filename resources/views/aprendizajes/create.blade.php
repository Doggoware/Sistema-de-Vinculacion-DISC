@extends('layouts.master')

@section('title', "Registrar Actividad de Aprendizaje + Servicio")

@section('content')
    <h1 class = "page-header">Registrar Actividad de Aprendizaje + Servicio</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ url('aprendizaje') }}">
        {{ csrf_field() }}
        * Campos obligatorios
        <br>
        <label for="asignatura">*Nombre de la asignatura:</label>
        <select name="asignatura" id="asignatura">
            @foreach($asign as $asig => $value)
                <option value="{{$value}}">
                    {{$value}}
                </option>
            @endforeach
        </select>
        <div class="form-group">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <label for="nombre"><th>*Nombre del profesor:</th></label>
                </tr>
                <tr>
                    <td><select name="nombre[]" id="nombre">@foreach($items as $item => $value)<option value="{{$value}}">{{$value}}</option>@endforeach</select></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Añadir otro profesor</button></td>
                </tr>
            </table>
        </div>
        <br>
        <label for="cantidad">*Cantidad Estudiantes:</label>
        <input type="text" name="cantidad" id="cantidad">
        <br>
        <label for="año">*Año:</label>
        <input type="text" name="año", id="año">
        <br>
        <label for="semestre">* Semestre:</label>
        <br>
        <input type="radio" name="semestre" value="1"> Primer Semestre<br>
        <input type="radio" name="semestre" value="2"> Segundo Semestre<br>
        <div class="form-group">
            <table class="table table-bordered" id="dynamic">
                <tr>
                    <label for="socio"><th>*Nombre del Socio Comunitario:</th></label>
                    <label for="evidencia"><th>*Evidencia del socio:</th></label>
                </tr>
                <tr>
                    <td><input type="text" name="socio[]" id="socio" placeholder="Diego Perez" class="form-control name_list"></td>
                    <td><input type="file" name="evidencia[]" accept=".pdf, .png, .jpg, .jpeg" class="form-control name_list"></td>
                    <td><button type="button" name="add2" id="add2" class="btn btn-success">Añadir otro socio</button></td>
                </tr>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Registrar" class="btn btn-success btn-block" style="height:40px; width:100px">
            <a href="{{ route('aprendizaje.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            var i = 1;
            var j = 1;
            $('#add').click(function () {
                if(i<=3){
                    i++;
                    $('#dynamic_field').append('<tr id="row'+i+'"><td><select name="nombre[]" id="nombre">@foreach($items as $item => $value)<option value="{{$value}}">{{$value}}</option>@endforeach</select></td><td><button name="remove" id="'+i+'" class="btn btn_remove" type="button">X</button></td></tr>');
                }
            });
            $('#add2').click(function () {
                if(j<=3){
                    j++;
                    $('#dynamic').append('<tr id="row2'+i+'"><td><input type="text" name="socio[]" id="socio" placeholder="Diego Perez" class="form-control name_list"></td><td><input type="file" name="evidencia[]" accept=".pdf, .png, .jpg, .jpeg" class="form-control name_list"></td><td><button name="remove" id="'+i+'" class="btn btn_remov" type="button">X</button></td></tr>');
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