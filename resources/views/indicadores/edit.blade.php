@extends('layouts.master')
@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Actualizar Indicadores</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-container">
                            <form method="POST" action="{{ route('indicadores.update',$indicadores->id) }}" role="form">
                                <input name="_method" type="hidden" value="PATCH">
                                {{ csrf_field() }}
                                <br>
                                <label for="nombre">*Nombre del indicador:</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Actividad vinculación" value="{{$indicadores->nombre}}">
                                <br>
                                <label for="descripcion">*Descripción del indicador:</label>
                                <input type="text" name="descripcion" id="descripcion" placeholder="Registra actividad" value="{{$indicadores->descripcion}}">
                                <br>
                                Descripción de lo que hace el indicador.
                                <br>
                                <label for="formula">*Formula de cálculo:</label>
                                <input type="text" name="formula" id="formula" placeholder="+1 Por actividad" value="{{$indicadores->formula}}">
                                <br>
                                Descripción de cuando aumenta o disminuye.
                                <br>
                                <label for="evidencia">*Tipo de evidencia:</label>
                                <input type="text" name="evidencia" id="evidencia" placeholder="¿Fotos, videos, documentos?" value="{{$indicadores->evidencia}}">
                                <br>
                                ¿Fotos, videos, documentos?
                                <div class="form-group">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <label for="fecha"><th>*Año de vigencia del indicador:</th></label>
                                            <label for="objetivo"><th>*Objetivo del indicador:</th></label>
                                        </tr>
                                        @for($i = 0; $i < count($indicadores->fecha); $i++)
                                            <tr>
                                                <td><input type="text" name="fecha[]" value="{{$indicadores->fecha[$i]}}"></td>
                                                <td><input type="text" name="objetivo[]" id="objetivo" placeholder="2008: 10, 2009: 30" value="{{$indicadores->objetivo[$i]}}"></td>
                                            </tr>
                                        @endfor
                                    </table>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block" style="height:40px; width:100px">
                                    <a href="{{ route('indicadores.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px">Atrás</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection