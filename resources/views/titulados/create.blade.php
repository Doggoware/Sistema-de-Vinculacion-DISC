@extends('layouts.master')

@section('title', "Registrar Titulados")

@section('content')
    <h1 class="page-header">Registrar Titulado</h1>

    <form method="POST" action="{{ url('titulados') }}">
        {{ csrf_field() }}
        * Campos obligatorios
        <div class="form-group">
            <table class="table table-bordered" id="dynamic_field">
                <tr>
                    <label for="nombre_titulado"><th>*Nombre del titulado:</th></label>
                    <label for="rut_titulado"><th>*RUT del titulado:</th></label>
                    <label for="telefono_titulado"><th>Teléfono del titulado:</th></label>
                    <label for="correo_titulado"><th>Correo del titulado:</th></label>
                    <label for="empresa_trabaja"><th>Empresa donde trabaja:</th></label>
                    <label for="anio_titulacion"><th>*Año de titulacion:</th></label>
                    <label for="carrera"><th>*Carrera:</th></label>
                </tr>
                <tr>
                    <td><input type="text" name="nombre_titulado[]" id="nombre_titulado" placeholder="Juan Perez"></td>
                    <td><input type="text" name="rut_titulado[]" id="rut_titulado" placeholder="12345678-9"></td>
                    <td><input type="text" name="telefono_titulado[]" id="telefono_titulado" placeholder="87654321"></td>
                    <td><input type="text" name="correo_titulado[]" id="correo_titulado" placeholder="jperez@placeholder.com"></td>
                    <td><input type="text" name="empresa_trabaja[]" id="empresa_trabaja" placeholder="Doggoware"></td>
                    <td><input type="text" name="anio_titulacion[]", id="anio_titulacion"></td>
                    <td><select name="carrera[]" id="carrera">@foreach($carrera as $carr => $value)<option value="{{$value}}">{{$value}}</option>@endforeach</select></td>
                    <td><button type="button" name="add" id="add" class="btn btn-success">Añadir otro titulado</button></td>
                </tr>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Registrar" class="btn btn-success btn-block" style="height:40px; width:100px">
            <a href="{{ route('titulados.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            var i = 1;
            $('#add').click(function () {
                if(i<=9){
                    i++;
                    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="nombre_titulado[]" id="nombre_titulado" placeholder="Juan Perez"></td>\n' +
                        '                    <td><input type="text" name="rut_titulado[]" id="rut_titulado" placeholder="12345678-9"></td>\n' +
                        '                    <td><input type="text" name="telefono_titulado[]" id="telefono_titulado" placeholder="87654321"></td>\n' +
                        '                    <td><input type="text" name="correo_titulado[]" id="correo_titulado" placeholder="jperez@placeholder.com"></td>\n' +
                        '                    <td><input type="text" name="empresa_trabaja[]" id="empresa_trabaja" placeholder="Doggoware"></td>\n' +
                        '                    <td><input type="text" name="anio_titulacion[]", id="anio_titulacion"></td>\n' +
                        '                    <td><select name="carrera[]" id="carrera">@foreach($carrera as $carr => $value)<option value="{{$value}}">{{$value}}</option>@endforeach</select></td><td><button name="remove" id="'+i+'" class="btn btn_remove">X</button></td></tr>');
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