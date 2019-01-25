
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
                                *Campos obligatorios
                                <input name="_method" type="hidden" value="PATCH">
                                <br>
                                *
                                <label for="nombre_titulado">Nombre del titulado:</label>
                                <input type="text" name="nombre_titulado" id="nombre_titulado" value="{{$titulado->nombre_titulado}}">

                                <br>
                                *
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
                                *
                                <label for="anio_titulacion">Año de titulacion:</label>
                                <input type="text" name="anio_titulacion", id="anio_titulacion" value="{{$titulado->anio_titulacion}}">

                                <br>
                                *
                                <label for="carrera">Carrera:</label>
                                <select name="carrera" id="carrera">
                                    <option value="{{$titulado->carrera}}">{{$titulado->carrera}}</option>
                                    @foreach($carrera as $carr => $value)
                                        @if($value != $titulado->carrera)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block" style="height:40px; width:100px">
                                    <a href="{{ route('titulados.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection