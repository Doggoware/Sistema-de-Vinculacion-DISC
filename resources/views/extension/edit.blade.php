
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
                        <h3 class="panel-title">Actualizar Actividad de Extensión</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">

                            <form method="POST" action="{{ route('extension.update',$extension->id) }}"  role="form">
                                {{ csrf_field() }}

                                <input name="_method" type="hidden" value="PATCH">

                                <br>
                                <label for="titulo">Nombre de la actividad:</label>
                                <input type="text" name="titulo" id="titulo" value="{{$extension->titulo}}">

                                <br>
                                <label for="nombre">Nombre del expositor:</label>
                                <input type="text" name="nombre" id="nombre" value="{{$extension->nombre}}">

                                <br>
                                <label for="fecha">Fecha de la actividad:*</label>
                                <input type="date" name="fecha" id="fecha" value="{{$extension->fecha}}">

                                <br>
                                <label for="lugar">Lugar de la actividad:</label>
                                <input type="text" name="lugar" id="lugar" value="{{$extension->lugar}}">

                                <br>
                                <label for="cantidad">Cantidad de participantes:</label>
                                <input type="text" name="cantidad" id="cantidad" value="{{$extension->cantidad}}">

                                <br>
                                <label for="organizador">Nombre del organizador:</label>
                                <input type="name" name="organizador" id="organizador" value="{{$extension->organizador}}">

                                <br>
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
                                <input type="radio" name="tipo_convenio" value=""> Ninguno

                                <br>
                                <label for="evidencia">Listado de participantes:*</label>
                                <input type="file" name="evidencia" id="evidencia"  accept=".pdf" value="{{$extension->evidencia}}">


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                    <a href="{{ route('extension.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection