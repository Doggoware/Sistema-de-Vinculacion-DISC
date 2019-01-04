@extends('layouts.master')

@section('content')
    <ul>
        @foreach($convenios as $convenio)
            <li>{{$convenio->nombre_empresa}}
                {{$convenio->tipo_convenio}}
                {{$convenio->fecha_inicio}}
                {{$convenio->fecha_termino}}
                {{$convenio->evidencia}}
            </li>
        @endforeach
    </ul>
@endsection