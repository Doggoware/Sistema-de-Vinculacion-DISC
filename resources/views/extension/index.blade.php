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
                                <a href="{{ route('extension.create') }}" class="btn btn-info" >Añadir Actividad de Extensión</a>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Nombre de la actividad</th>
                                <th>Nombre del expositor</th>
                                <th>Fecha de la actividad</th>
                                <th>Lugar de la actividad</th>
                                <th>Cantidad de participantes</th>
                                <th>Nombre del organizador</th>
                                <th>Tipo de convenio</th>
                                <th>Evidencia</th>
                                </thead>
                                <tbody>
                                @if($extension->count())
                                    @foreach($extension as $extension)
                                        <tr>
                                            <td>{{$extension->titulo}}</td>
                                            <td>{{$extension->nombre}}</td>
                                            <td>{{$extension->fecha}}</td>
                                            <td>{{$extension->lugar}}</td>
                                            <td>{{$extension->cantidad}}</td>
                                            <td>{{$extension->organizador}}</td>
                                            <td>{{$extension->convenio}}</td>
                                            <td>{{$extension->evidencia}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('ExtensionController@edit', $extension->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('ExtensionController@destroy', $extension->id)}}" method="post">
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
                    {{ $extension->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection