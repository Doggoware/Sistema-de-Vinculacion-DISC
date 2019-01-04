@extends('layouts.master')

@section('content')
    <ul>
    @foreach($registros as $registro)
        <li>{{$registro->nombre}}
            {{$registro->fecha}}
        </li>
    @endforeach
    </ul>
@endsection