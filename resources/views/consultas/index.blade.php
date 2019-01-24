@extends('layouts.master')

@section('content')
    <div class="row">
        <form class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>Consultas sobre actividades</h3></div>
                    </div>
                    <div>
                        <a href='{{action('ConsultaController@todas')}}'>Revisar todas las actividades</a>
                    </div>
                    <div>
                        <a href='{{action('TituladosController@todos')}}'>Revisar todos los titulados</a>
                    </div>
                    <?php
                        $carrera = '';
                    ?>
                    <form method="GET" action="{{action('TituladosController@carrera',$carrera)}}"  role="form">
                        {{ csrf_field() }}
                    <a id="more" href="#" onclick="$('.details').slideToggle(function(){$('#more').html($('.details').is(':visible')?'Mostrar por carrera':'Mostrar por carrera');});">Mostrar por carrera</a>
                        <div class="details" style="display:none"> <label for="carrera">Carrera a buscar:</label>
                            <input type="text" name="carrera" id="carrera" placeholder="ICCI">
                            <?php
                                $carrera = isset($_POST['carrera']) ? $_POST['carrera'] : '';
                            ?>

                            <input type="submit" value="Revisar" class="btn btn-success btn-sm">
                        </div>
                    </form>
                    </div>
                </div>
        </form>
    </div>

@endsection