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



</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow p-3 mb-5 rounded">
            <img src="http://www.ucn.cl/wp-content/uploads/2018/05/Escudo-UCN-Full-Color.png" width="80" height="80" class="m-2">
            <a class="navbar-brand text-left" href="#">Sistema de Vinculacion DISC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Iniciar Sesion<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registrarse</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="http://www.noticias.ucn.cl/wp-content/uploads/2018/05/UCNlogo.jpg" class="d-block w-80" alt="...">
            </div>
            <div class="carousel-item">
                <img src="http://www.noticias.ucn.cl/wp-content/files_mf/cache/th_7445c7bc99903fe147f3c84bdb82a492_capacitacionsoftware3.jpg" class="d-block w-80" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://scontent.fanf1-1.fna.fbcdn.net/v/t1.0-9/47175997_2081966991853860_8835773112659214336_n.jpg?_nc_cat=100&_nc_ht=scontent.fanf1-1.fna&oh=f086100e2ec61457507d449723388d1f&oe=5CBBEE16" class="d-block w-50" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class = "container-fluid">
        <div class="jumbotron text-center" style="background: #3f9ae5">
            @yield('content')
        </div>


    </div>
        <!-- /#page-wrapper -->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>
