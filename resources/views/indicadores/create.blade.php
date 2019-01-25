@extends('layouts.master')

@section('title', "Definir Indicador")

@section('content')
    <h1 class = "page-header">Definir Indicador</h1>

    <form method="POST" enctype="multipart/form-data" action="{{ url('indicadores') }}">
        {{ csrf_field() }}
        * campos obligatorios.
        <br>
        <label for="nombre">*Nombre del indicador:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Actividad vinculación">
        <br>
        <label for="descripcion">*Descripción del indicador:</label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Registra actividad">
        <br>
        Descripción de lo que hace el indicador.
        <br>
        <label for="formula">*Formula de cálculo:</label>
        <input type="text" name="formula" id="formula" placeholder="+1 Por actividad">
        <br>
        Descripción de cuando aumenta o disminuye.
        <br>
        <label for="evidencia">*Tipo de evidencia:</label>
        <input type="text" name="evidencia" id="evidencia" placeholder="¿Fotos, videos, documentos?">
        <br>
        ¿Fotos, videos, documentos?
        <div class="form-group">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <label for="fecha"><th>*Año de vigencia del indicador:</th></label>
                    <label for="objetivo"><th>*Objetivo del indicador:</th></label>
                </tr>
                <tr>
                    <td><input type="text" name="fecha[]" id="fecha" placeholder="2008"></td>
                    <td><input type="text" name="objetivo[]" id="objetivo" placeholder="10"></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Añadir otro objetivo</button></td>
                </tr>
            </table>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Registrar" class="btn btn-success btn-block" style="height:40px; width:100px">
            <a href="{{ route('indicadores.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            var i = 1;
            $('#add').click(function () {
                if(i<=9){
                    i++;
                    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="fecha[]" id="fecha" placeholder="2008"></td><td><input type="text" name="objetivo[]" id="objetivo" placeholder="10"></td><td><button name="remove" id="'+i+'" class="btn btn_remove">X</button></td></tr>');
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