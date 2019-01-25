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
                        <h3 class="panel-title">Actualizar Actividad de titulacion</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{ route('titulacion.update',$titulacion->id) }}"  role="form">
                                {{ csrf_field() }}
                                *Campos obligatorios
                                <input name="_method" type="hidden" value="PATCH">
                                <br>
                                <label for="titulo_actividad">Titulo de la Actividad:</label>
                                <input type="text" name="titulo_actividad" id="titulo_actividad" value="{{$titulacion->titulo_actividad}}"><br>
                                <div class="form-group">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <label for="nombre_estudiante"><th>*Nombre del estudiante:</th></label>
                                            <label for="rut"><th>*Rut del estudiante:</th></label>
                                            <label for="carrera"><th>*Carrera:</th></label>
                                        </tr>
                                        @for($i = 0; $i < count($titulacion->nombre_estudiante); $i++)
                                            <tr>
                                                <td><input type="text" name="nombre_estudiante[]" id="nombre_estudiante" value="{{$titulacion->nombre_estudiante[$i]}}"></td>
                                                <td><input type="text" name="rut[]" id="rut" value="{{$titulacion->rut[$i]}}"></td>
                                                <td>
                                                    <select name="carrera[]">
                                                        <option value="{{$titulacion->carrera[$i]}}">{{$titulacion->carrera[$i]}}</option>
                                                        @foreach($carrera as $car => $value)
                                                            @if($titulacion->carrera[$i] != $value)
                                                                <option value="{{$value}}">{{$value}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @endfor
                                    </table>
                                </div>
                                <label for="fecha_inicio">*Fecha de Inicio:</label>
                                <input type="date" name="fecha_inicio"value="{{$titulacion->fecha_inicio}}"><br>

                                <label for="fecha_fin">Fecha de Termino:</label>
                                <input type="date" name="fecha_fin"value="{{$titulacion->fecha_fin}}"><br>

                                <label for="prof_guia">Nombre del Profesor Guia:</label>
                                @foreach($titulacion->prof_guia as $prof)
                                    <select name="prof_guia[]">
                                        <option value="{{$prof}}">{{$prof}}</option>
                                        @foreach($items as $item => $value)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                @endforeach
                                *
                                <label for="empresa">Nombre de la empresa:</label>
                                <select name="empresa">
                                    <option value="{{$titulacion->empresa}}">{{$titulacion->empresa}}</option>
                                    @foreach($empresa as $empre => $value)
                                        <option value="{{$value}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block" style="height:40px; width:100px">
                                    <a href="{{ route('titulacion.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection