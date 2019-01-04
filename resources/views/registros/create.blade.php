@extends('layouts.master')

@section('content')


<div class="container">

    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-7 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-body" >
                <form  class="form-horizontal" method="post" action="/registro">
                {{csrf_field()}}
                    <div id="div_id_name" class="form-group required">
                        <label for="id_name" class="control-label col-md-4  requiredField">Nombre<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input required class="input-md textinput textInput form-control" id="id_name" name="nombre" placeholder="Ingrese nombre de registro" style="margin-bottom: 10px" />
                        </div>
                    </div>

                    <div id="div_id_date" class="form-group required">
                        <label for="id_date" class="control-label col-md-4  requiredField"> Fecha de registro<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-8 ">
                            <input required id="date" type="date" name="fecha" style="margin-bottom: 10px">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="aab controls col-md-4 "></div>
                        <div class="controls col-md-8 ">
                            <input type="submit"  class="btn btn-primary btn btn-info" />
                        </div>
                    </div>

                </form>



            </div>
        </div>
    </div>
</div>
@endsection