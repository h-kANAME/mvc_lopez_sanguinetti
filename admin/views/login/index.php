<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= constant('URL') ?>public/css/main.css" />
    </head>
</head>

<body class="backdark">

    <div class="container text-center my-5">
        <div class="row">
            <div class="col">
                <a href="#"><img src="<?= constant('URL') ?>public/img//Logos_Banners/logoKYZ.png" alt="" width="422" height="102"></a>
            </div>
        </div>
    </div>

    <div class="container my-5">

        <div class="col-lg-8 offset-lg-2 col-md-12 offset-md-6 col-12">
            <h1 class="text-white">Iniciar Sesion</h1>

            <form action='<?php echo constant('URL'); ?>login/obtenerDatosPost' method="post" class="my-5">
                <div class="error"><?php echo $this->mensaje ?></div></br>
                
                <div class="form-group">
                    <p><input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="admin.emmanuel@kyz.com.ar">
                    <p><input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" value=""></p>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Ingresar</button>
                </div>
            </form>

            <p class="text-center mt-5 mb-3 text-muted">© 2021-2021</p>

        </div>

    </div>

</body>

</html>