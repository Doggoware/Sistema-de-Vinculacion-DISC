<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>@yield('title') Doggoware</title>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow p-3 mb-5 rounded">
        <img src="http://www.ucn.cl/wp-content/uploads/2018/05/Escudo-UCN-Full-Color.png" width="80" height="80" class="m-2">
        <a class="navbar-brand text-left" href="{{url('')}}">Sistema de Vinculacion DISC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}" id="navbarDropdown" aria-haspopup="true" aria-expanded="false">
                        Inicio
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Convenios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href={{ url('convenio/create') }}>Agregar Convevios</a>
                        <a class="dropdown-item" href={{ route('convenio.index') }}>Modificar Convenios</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href={{ route('convenio.index') }}>Eliminar Convenios</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Aprendizaje A+S
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('aprendizaje/create') }}">Agregar A+S</a>
                        <a class="dropdown-item" href="{{ route('aprendizaje.index') }}">Modificar A+S</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('aprendizaje.index') }}">Eliminar A+S</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actividades de Extension
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('extension/create') }}">Agregar Extension</a>
                        <a class="dropdown-item" href="{{ route('convenio.index') }}">Modificar Extension</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('convenio.index') }}">Eliminar Extension</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Titulados
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('titulados/create') }}">Agregar Titulado</a>
                        <a class="dropdown-item" href="{{ route('titulados.index') }}">Modificar Titulado</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('titulados.index') }}">Eliminar Titulado</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Titulaciones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('titulacion/create') }}">Agregar Actividad de Titulacion</a>
                        <a class="dropdown-item" href="{{ route('titulacion.index') }}">Modificar Actividad de Titulacion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('titulacion.index') }}">Eliminar Actividad de Titulacion</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>

</head>

<body>

    <header>

    </header>

    <div class = "container-fluid">

        <div class="panel panel-default">

            <div class="row">

                <div class="col">
                    <div class="jumbotron">

                    </div>
                </div>

                <div class="col">
                    <div class="jumbotron-fluid shadow p-3 mb-5 rounded">
                        @yield('content')
                    </div>

                </div>

                <div class="col">
                    <div class="jumbotron">

                    </div>
                </div>
            </div>

        </div>

    </div>

    <footer id="footer">
        <style>
            footer
            {
                margin-top:50px;
                width:100%;
                height:150px;
                background-color:#5a6268;
            }
        </style>
        <div class="container-fluid align-content-around" style="background: #5a6268">

            <div class="row align-bottom">

                <div class="col-12 col-lg">
                   <img src="https://eic.ucn.cl/wp-content/uploads/2017/10/acred-ucn-716.png">
                </div>
            </div>
        </div>
    </footer>
        <!-- /#page-wrapper -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>
