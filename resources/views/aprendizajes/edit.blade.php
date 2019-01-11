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
                                <label for="asignatura">Nombre de la asignatura:</label>
                                <input type="text" name="asignatura" id="asignatura" value="{{$aprendizaje->asignatura}}">

                                <br>
                                <label for="nombre">Nombre del profesor:</label>
                                <input type="text" name="nombre" id="nombre" value="{{$aprendizaje->nombre}}">

                                <br>
                                <label for="cantidad">Cantidad Estudiantes:</label>
                                <input type="text" name="cantidad" id="cantidad" value="{{$aprendizaje->cantidad}}">

                                <br>
                                <label for="socio">Nombre del Socio Comunitario:</label>
                                <input type="text" name="socio" id="socio" value="{{$aprendizaje->socio}}">

                                <br>
                                <label for="año">Año:</label>
                                <input type="text" name="año" id="año" value="{{$aprendizaje->año}}">

                                <br>
                                <label for="semestre">Semestre:</label>
                                <input type="text" name="semestre", id="semestre" value="{{$aprendizaje->semestre}}">

                                <br>
                                <label for="evidencia">Listado de participantes:*</label>
                                <input type="file" name="evidencia" id="evidencia" accept=".pdf, .png, .jpg, .jpeg" value="{{$aprendizaje->evidencia}}">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                    <a href="{{ route('aprendizaje.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection