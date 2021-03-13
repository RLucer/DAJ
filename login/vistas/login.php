<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intranet Girona S.A.</title>
    <link rel="stylesheet" href="/intranet_inventario/login/stylo.css">
 
    <!--   <link rel="stylesheet" href="main.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
            shrink-to-fit=no">
    <meta name="description" content="Formulario de login con Bootstrap">
    <meta name="author" content="Parzibyte">
    <title>Formulario de login con Bootstrap</title>
    <!-- Cargar el CSS de Boostrap
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <title>Formulario de sesion</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/v4-shims.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/v4-shims.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="validarRUT.js"></script>
</head>

<body>

    <div id="form">
        <div id="content">
        <form action="" method="POST" id="formu" onsubmit="return checkRut(username)" >
            <?php
            if (isset($errorLogin)) {
                echo $errorLogin;
            }
            ?>
            <center>
           <!--     <div class="icon">
                    <i class="material-icons">account_box</i>
                    <h4>LOGIN COPAN LTDA.</h4><br><br>
                </div>
        -->
        <br><br><br>
            </center>

            
                <br><br>
                <input type="text" name="username" placeholder=" &#129485;     Ingresa tu RUT"  onblur="return checkRut(username)" required ><br><br>
                <input type="password" name="password" placeholder="&#128272;     Password   " required><br><br>
                <center><button type="submit">INGRESAR</button></center>

            </form>

        </div>
    </div>

</body>

</html>