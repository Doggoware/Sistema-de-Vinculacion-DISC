@extends('layouts.master')

@section('content')
    <ul>
        @foreach($titulados as $titulados)
            <li>{{$titulados->nombre_titulado}}
                {{$titulados->rut_titulado}}
                {{$titulados->telefono_titulado}}
                {{$titulados->correo_titulado}}
                {{$titulados->empresa_trabaja}}
                {{$titulados->año_titulacion}}
                {{$titulados->carrera}}
            </li>
        @endforeach
    </ul>
@endsection