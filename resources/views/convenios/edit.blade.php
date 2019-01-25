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
                                *
                                <label for="nombre_empresa">Nombre Empresa:</label>
                                <input type="text" name="nombre_empresa" id="nombre_empresa" value="{{$convenio->nombre_empresa}}">
                                <br>
                                <div class="form-group">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <label for="tipo_convenio"><th>Tipo de Convenio:</th></label>
                                        </tr>
                                        @foreach($convenio->tipo_convenio as $conv)
                                            <tr>
                                                <td><select name="tipo_convenio[]">
                                                        <option value="{{$conv}}">{{$conv}}</option>
                                                        @if($conv == "Capstone" || $conv == "capstone")
                                                            <option value="Marco">Marco</option>
                                                            <option value="Especifico">Especifico</option>
                                                            <option value="A+S">A+S</option>
                                                        @endif
                                                        @if($conv == "Marco" || $conv == "marco")
                                                            <option value="Capstone">Capstone</option>
                                                            <option value="Especifico">Especifico</option>
                                                            <option value="A+S">A+S</option>
                                                        @endif
                                                        @if($conv == "Especifico" || $conv == "especifico")
                                                            <option value="Capstone">Capstone</option>
                                                            <option value="Marco">Marco</option>
                                                            <option value="A+S">A+S</option>
                                                        @endif
                                                        @if($conv == "A+S" || $conv == "a+s")
                                                            <option value="Capstone">Capstone</option>
                                                            <option value="Marco">Marco</option>
                                                            <option value="Especifico">Especifico</option>
                                                        @endif
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <label for="fecha_inicio">*Fecha de Inicio:</label>
                                <input type="date" name="fecha_inicio" value="{{$convenio->fecha_inicio}}"><br>
                                <label for="fecha_termino">*Fecha de Termino:</label>
                                <input type="date" name="fecha_termino" value="{{$convenio->fecha_termino}}">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Actualizar" class="btn btn-success btn-block" style="height:40px; width:100px">
                                    <a href="{{ route('convenio.index') }}" class="btn btn-info btn-block" style="height:40px; width:100px" >Atrás</a>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection@endsection