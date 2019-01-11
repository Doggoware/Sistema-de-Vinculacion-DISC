<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') Sistema de Vinculación DISC</title>

    <!-- Bootstrap Core CSS -->
    <link href={{asset("vendor/bootstrap/css/bootstrap.min.css")}} rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href={{asset("vendor/metisMenu/metisMenu.min.css")}} rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href={{asset("vendor/morrisjs/morris.css")}} rel="stylesheet">

    <!-- Custom Fonts -->
    <link href={{asset("vendor/font-awesome/css/font-awesome.min.css")}} rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- MetisMenu CSS
    <link href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.3/metisMenu.css" rel="stylesheet">
    -->
    <!-- Custom CSS -->
    <link href={{asset("css/sb-admin-2.min.css")}} rel="stylesheet">

    <!-- Morris Charts CSS
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <!-- Custom Fonts
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 -->
    <script src={{asset("vendor/jquery/jquery.min.js")}}></script>

    <!-- Bootstrap Core JavaScript -->
    <script src={{asset("vendor/bootstrap/js/bootstrap.min.js")}}></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src={{asset("vendor/metisMenu/metisMenu.min.js")}}></script>

    <!-- Morris Charts JavaScript -->
    <script src={{asset("vendor/raphael/raphael.min.js")}}></script>
    <script src={{asset("vendor/morrisjs/morris.min.js")}}></script>

    <!-- Custom Theme JavaScript -->
    <script src={{asset("js/sb-admin-2.min.js")}}></script>

</head>

<body>


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.nav')

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                  <!--  <h1 class="page-header">Dashboard</h1>-->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @yield('content')
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->



</body>

</html>
