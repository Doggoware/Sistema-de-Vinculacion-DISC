
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
                        <h3 class="panel-title">Actualizar Convenios de Colaboración</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">

                            <form method="POST" action="{{ route('convenio.update',$convenio->id) }}"  role="form">
                                {{ csrf_field() }}

                                <input name="_method" type="hidden" value="PATCH">
                                <br>
                                <label for="nombre_empresa">Nombre Empresa:</label>
                                <input type="text" name="nombre_empresa" id="nombre_empresa" value="{{$convenio->nombre_empresa}}">

                                <br>
                                <label for="tipo_convenio">Tipo de Convenio:</label>
                                <br>
                                <input type="checkbox" name="tipo_convenio" value="capstone" checked> Capstone<br>
                                <input type="checkbox" name="tipo_convenio" value="marco"> Marco<br>
                                <input type="checkbox" name="tipo_convenio" value="especifico"> Especifico<br>
                                <input type="checkbox" name="tipo_convenio" value="as"> A+S

                                <br>
                                <label for="fecha_inicio">Fecha de Inicio:</label>
                                <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{$convenio->fecha_inicio}}">

                                <br>
                                <label for="fecha_termino">Fecha de Termino:</label>
                                <input type="date" name="fecha_termino" id="fecha_termino" value="{{$convenio->fecha_termino}}">

                                <br>
                                <label for="evidencia">Evidencia de la actividad:*</label>
                                <input type="file" name="evidencia" id="evidencia"  accept=".pdf" value="{{$convenio->evidencia}}">


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
                                    <a href="{{ route('convenio.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection