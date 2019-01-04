@extends('layouts.master')

@section('content')
    <ul>
        @foreach($aprendizaje as $aprendizaje)
            <li>{{$aprendizaje->asignatura}}
                {{$aprendizaje->nombre}}
                {{$aprendizaje->cantidad}}
                {{$aprendizaje->socio}}
                {{$aprendizaje->año}}
                {{$aprendizaje->semestre}}
                {{$aprendizaje->evidencia}}
            </li>
        @endforeach
    </ul>
@endsection