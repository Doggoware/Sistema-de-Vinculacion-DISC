@extends('layout')

@section('content')
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>RUT</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Empresa</th>
            <th>Año de titulación</th>
            <th>Carrera</th>
        </tr>
        </thead>
        <tbody>
        @foreach($titulados as $titulado)
            <tr>
                <td>{{$titulado->nombre_titulado}}</td>
                <td>{{$titulado->rut_titulado}}</td>
                <td>{{$titulado->telefono_titulado}}</td>
                <td>{{$titulado->correo_titulado}}</td>
                <td>{{$titulado->empresa_trabaja}}</td>
                <td>{{$titulado->año_titulacion}}</td>
                <td>{{$titulado->carrera}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection