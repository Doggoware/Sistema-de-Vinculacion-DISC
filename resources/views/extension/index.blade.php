@extends('layouts.master')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
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
                                    @foreach($extension as $extensions)
                                        <tr>
                                            <td>{{$extensions->titulo}}</td>
                                            <td>{{$extensions->nombre}}</td>
                                            <td>{{$extensions->fecha}}</td>
                                            <td>{{$extensions->lugar}}</td>
                                            <td>{{$extensions->cantidad}}</td>
                                            <td>{{$extensions->organizador}}</td>
                                            <td>{{$extensions->tipo_convenio}}</td>
                                            <td>{{$extensions->evidencia}}</td>
                                            <td><a class="btn btn-primary btn-xs" href="{{action('ExtensionController@edit', $extensions->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td>
                                                <form action="{{action('ExtensionController@destroy', $extensions->id)}}" method="post">
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