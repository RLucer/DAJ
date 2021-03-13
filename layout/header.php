<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home_Administrador</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../../login/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsdPmZv3_aXiNIk8quqAtDJA1thfyWBGA&callback=initMap"></script>


    <div class="container-fluid p-1 my-100 bg-dark text-white">

        <CENTER>
            <h4>ANALISIS DE INFORMACION</h4>
        </CENTER>
        <?php
      /*  $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        date_default_timezone_set('America/Santiago');
        echo $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "     Hora:" .   date("G:i:s");;
        //Salida: Viernes 24 de Febrero del 2012*/




        ?>


        <div class="cerrar-sesion">




            <p class="text-left">



                <a class="btn btn-success " href="/intranet_copan/login/includes/logout.php">Cerrar Sesión</a>

        </div>
        <br>


        <?php

        include_once 'includes/user_session.php'; ?>
        <!--  <?php// echo $_SESSION['user']; ?> <br>-->
        <?php echo $_SESSION['nom']; ?> <?php echo $_SESSION['apellido'] . "   /   "; ?>
        <?php echo $_SESSION['permiso'] . "   /   "; ?>
        <?php echo $_SESSION['user']; ?>
        <?php //echo $user->getNombre(); echo " ";echo $user->get_Apellido(); 
        ?>
        <?php //echo $user->get_nompermiso(); 
        ?>

        </p>
        </ul>
    </div>
    </div>







</head>

<body>