<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pico - Placa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    

</head>

<body>
@if (session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>
    
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>
    
@endif
    <div class="form-row">
        <div class="container">
            <div class="table-wrapper ">
            <a href="/es"> Español</a>
                <div class="table-title">
                    <div class="col-sm-12">
                    
                        <h2>PICO Y <b>PLACA</b></h2>
                    </div>
                    <div class="col-sm-8">
                        <br>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            
                            <form action="/Verificar" method="post">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Licence Plate Number</label>
                                    <input type="text" class="form-control" id="placa" name="placa" pattern= "[a-zA-Z]{3}[-][0-9]{3}|[a-zA-Z]{3}[-][0-9]{4}"
                                         placeholder="XXX-999 o XXX-9999" maxlength="8" required >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">time</label>
                                    <input type="time" class="form-control" id="hora"name="hora"
                                        placeholder="Ingresar Hora" min="00:00" max="24:00" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Date </label>
                                    <input type="date" value="2020-01-01" min="1900-01-01"  class="form-control" id="fecha"name="fecha" required
                                        placeholder="Ingresar Fecha Nacimiento">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="language" name="language" style= 'visibility: hidden;' value = 'en'>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg" > <i class="fa fa-check"></i> Check</button>
                                <br>
                                <br>
                                <br>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

</body>

</html>