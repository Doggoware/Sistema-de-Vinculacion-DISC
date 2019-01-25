@extends('layouts.master')

@section('title', "Registrar Convenios de Colaboración")

@section('content')
    <h1 class = "page-header">Registrar Convenios de Colaboración</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ url('convenio') }}">
        {{ csrf_field() }}
        * campos obligatorios.
        <br>
        <label for="nombre_empresa">* Nombre Empresa:</label>
        <input type="text" name="nombre_empresa" id="nombre_empresa" placeholder="Arcos Dorados">
        <br>
        <div class="form-group">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <label for="tipo_convenio"><th>*Tipo de Convenio:</th></label>
                    <label for="evidencia"><th>*Evidencia de la actividad:</th></label>
                </tr>
                <tr>
                    <td><select name="tipo_convenio[]" id="tipo_convenio"><option value="Capstone">Capstone</option><option value="Marco">Marco</option><option value="Especifico">Especifico</option><option value="A+S">A+S</option></select></td>
                    <td><input type="file" name="evidencia[]" accept=".pdf"></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Añadir otro convenio</button></td>
                </tr>
            </table>
        </div>
        <label for="fecha_inicio">*Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio"><br>
        <label for="fecha_termino">*Fecha de Termino:</label>
        <input type="date" name="fecha_termino">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Registrar" class="btn btn-success btn-block" style="height:40px; width:100px">
            <a href="{{ route('convenio.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            var i = 1;
            $('#add').click(function () {
                if(i<=3){
                    i++;
                    $('#dynamic_field').append('<tr id="row'+i+'"><td><select name="tipo_convenio[]" id="tipo_convenio"><option value="capstone">Capstone</option><option value="marco">Marco</option><option value="especifico">Especifico</option><option value="as">A+S</option></select></td><td><input type="file" name="evidencia[]" accept=".pdf"></td><td><button name="remove" id="'+i+'" class="btn btn_remove">X</button></td></tr>');
                }
            });
            $(document).on('click', '.btn_remove', function (){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
                i--;
            });
        });
    </script>

@endsection