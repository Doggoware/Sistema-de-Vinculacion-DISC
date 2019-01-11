@extends('layouts.master')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-info">
                        {{Session::get('success')}}
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Actualizar Titulado</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">

                            <form method="POST" action="{{ route('titulados.update',$titulado->id) }}"  role="form">
                                {{ csrf_field() }}

                                <input name="_method" type="hidden" value="PATCH">
                                <br>
                                <label for="nombre_titulado">Nombre del titulado:</label>
                                <input type="text" name="nombre_titulado" id="nombre_titulado" value="{{$titulado->nombre_titulado}}">

                                <br>
                                <label for="rut_titulado">RUT del titulado:</label>
                                <input type="text" name="rut_titulado" id="rut_titulado" value="{{$titulado->rut_titulado}}">

                                <br>
                                <label for="telefono_titulado">Teléfono del titulado:</label>
                                <input type="text" name="telefono_titulado" id="telefono_titulado" value="{{$titulado->telefono_titulado}}">

                                <br>
                                <label for="correo_titulado">Correo del titulado:</label>
                                <input type="text" name="correo_titulado" id="correo_titulado" value="{{$titulado->correo_titulado}}">

                                <br>
                                <label for="empresa_trabaja">Empresa donde trabaja:</label>
                                <input type="text" name="empresa_trabaja" id="empresa_trabaja" value="{{$titulado->empresa_trabaja}}">

                                <br>
                                <label for="año_titulacion">Año de titulacion:</label>
                                <input type="text" name="año_titulacion", id="año_titulacion" value="{{$titulado->año_titulacion}}">

                                <br>
                                <label for="carrera">Carrera:</label>
                                <input type="text" name="carrera" id="carrera" value="{{$titulado->carrera}}">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                    <a href="{{ route('titulados.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
       </div>
@endsection