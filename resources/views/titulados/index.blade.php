@extends('layouts.master')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <ul>
        @foreach($titulados as $titulados)
            <li>{{$titulados->nombre_titulado}}
                {{$titulados->rut_titulado}}
                {{$titulados->telefono_titulado}}
                {{$titulados->correo_titulado}}
                {{$titulados->empresa_trabaja}}
                {{$titulados->anio_titulacion}}
                {{$titulados->carrera}}
            </li>
        @endforeach
    </ul>
@endsection