@extends('layouts.master')

@section('content')
    <ul>
        @foreach($extension as $extension)
            <li>{{$extension->titulo}}
                {{$extension->nombre}}
                {{$extension->fecha}}
                {{$extension->lugar}}
                {{$extension->cantidad}}
                {{$extension->organizador}}
                {{$extension->tipo_convenio}}
                {{$extension->evidencia}}
                {{$extension->fotos}}
            </li>
        @endforeach
    </ul>
@endsection