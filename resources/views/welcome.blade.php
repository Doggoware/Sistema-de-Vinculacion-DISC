<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Vinculacion</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                color: #303F9F;
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: underline;
                text-transform: uppercase;

            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Sistema de Vinculación DISC
                </div>

                <div class="links">
                    <a href="http://192.168.10.10/convenio/">Administrar Convenios</a><br/><br/>
                    <a href="http://192.168.10.10/extencion/">Administrar Actividades de Extención</a><br/><br/>
                    <a href="http://192.168.10.10/aprendizaje">Administrar Actividades de A+S</a><br/><br/>
                    <a href="http://192.168.10.10/">Administrar Actividades de titulación</a><br/><br/>
                    <a href="http://192.168.10.10/">Registrar Titulados</a><br/><br/>
                    <a href="http://192.168.10.10/">Actualizar Valores de Indicadores</a><br/><br/>
                </div>
            </div>
        </div>
    </body>
</html>
