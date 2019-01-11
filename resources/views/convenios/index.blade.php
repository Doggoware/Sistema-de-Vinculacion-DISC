@extends('layouts.master')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Lista Convenios de Colaboración</h3></div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('convenio.create') }}" class="btn btn-info" >Añadir Convenios de Colaboración</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre Empresa</th>
                                <th>Tipo de convenio</th>
                                <th>Fecha inicio</th>
                                <th>Fecha termino</th>
                                <th>Evidencia</th>
                                </thead>
                                <tbody>
                                @if($convenios->count())
                                    @foreach($convenios as $convenio)
                                        <tr>
                                            <td>{{$convenio->nombre_empresa}}</td>
                                            <td>{{$convenio->tipo_convenio}}</td>
                                            <td>{{$convenio->fecha_inicio}}</td>
                                            <td>{{$convenio->fecha_termino}}</td>
                                            <td>{{$convenio->evidencia}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('ConvenioController@edit', $convenio->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('ConvenioController@destroy', $convenio->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">No hay registro !!</td>
                                    </tr>
                                @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{ $convenios->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection