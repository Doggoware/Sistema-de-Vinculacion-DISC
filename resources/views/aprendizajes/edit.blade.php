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
                        <h3 class="panel-title">Actualizar Actividad de Aprendizaje + Servicio</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">

                            <form method="POST" action="{{ route('aprendizaje.update',$aprendizaje->id) }}"  role="form">
                                {{ csrf_field() }}

                                <input name="_method" type="hidden" value="PATCH">
                                <br>
                                *
                                <label for="asignatura">Nombre de la asignatura:</label>
                                <select name="asignatura">
                                    <option value="{{$aprendizaje->asignatura}}">{{$aprendizaje->asignatura}}</option>
                                    @foreach($asig as $asi => $value)
                                        @if($aprendizaje->asignatura != $value)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <label for="nombre"><th>*Nombre del profesor:</th></label>
                                        </tr>
                                        @foreach($aprendizaje->nombre as $apre)
                                            <tr>
                                                <td>
                                                    <select name="nombre[]">
                                                        <option value{{$apre}}>{{$apre}}</option>
                                                        @foreach($items as $item => $value)
                                                            @if($apre != $value)
                                                                <option value="{{$value}}">{{$value}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                *
                                <label for="cantidad">Cantidad Estudiantes:</label>
                                <input type="text" name="cantidad" id="cantidad" value="{{$aprendizaje->cantidad}}">
                                <br>
                                *
                                <label for="año">Año:</label>
                                <input type="text" name="año" id="año" value="{{$aprendizaje->año}}">

                                <br>
                                *
                                <label for="semestre">Semestre:</label>
                                <input type="text" name="semestre", id="semestre" value="{{$aprendizaje->semestre}}">
                                <br>
                                <div class="form-group">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <label for="socio"><th>*Nombre del Socio Comunitario:</th></label>
                                        </tr>
                                        @foreach($aprendizaje->socio as $apr)
                                            <tr>
                                                <td><input type="text" name="socio[]" id="socio" value="{{$apr}}"></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block" style="height:40px; width:100px">
                                    <a href="{{ route('aprendizaje.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection