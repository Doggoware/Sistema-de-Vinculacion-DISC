@extends('layouts.master')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Actualizar Actividad de Extensión</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">

                            <form method="POST" action="{{ route('extension.update',$extension->id) }}"  role="form">
                                {{ csrf_field() }}
                                *Campos obligatorios
                                <input name="_method" type="hidden" value="PATCH">
                                <br>
                                *
                                <label for="titulo">Nombre de la actividad:</label>
                                <input type="text" name="titulo" id="titulo" value="{{$extension->titulo}}">
                                <br>
                                <div class="form-group">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <label for="nombre"><th>*Nombre del expositor:</th></label>
                                        </tr>
                                        @foreach($extension->nombre as $ext)
                                            <tr>
                                                <td><input type="text" name="nombre[]" id="nombre" value="{{$ext}}"></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <label for="lugar">*Fecha de la actividad:</label>
                                <input type="date" name="fecha" id="fecha" value="{{$extension->fecha}}">
                                <br>
                                *
                                <label for="lugar">Lugar de la actividad:</label>
                                <input type="text" name="lugar" id="lugar" value="{{$extension->lugar}}">
                                <br>
                                *
                                <label for="cantidad">Cantidad de participantes:</label>
                                <input type="text" name="cantidad" id="cantidad" value="{{$extension->cantidad}}">
                                <br>
                                <div class="form-group">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <label for="organizador"><th>Nombre del organizador:</th></label>
                                        </tr>
                                        @foreach($extension->organizador as $et)
                                            <tr>
                                                <td><input type="name" name="organizador[]" id="organizador" value="{{$et}}"></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <label for="tipo_convenio">¿A qué convenio pertenece?</label>
                                <input type="text" name="tipo_convenio" value="{{$extension->tipo_convenio}}" readonly>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block" style="height:40px; width:100px">
                                    <a href="{{ route('extension.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection