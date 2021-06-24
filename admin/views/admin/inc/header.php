<?php
include_once ('inc/sidebar.php');


 if(isset($_POST['validacionUsuario'])){
 	$datos->validacionUsuario($_POST);
 }

 if(isset($_GET['logout'])){
     unset($_SESSION['usuario']); 
 }
	 
 if($datos->notLogged()){
     header("location:../admin");
 }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= constant('URL') ?>public/css/main.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-dark">
            <div class="container ml-6 px-5">
                <a class="navbar-brand text-white" href="<?= constant('URL') ?>login"><img src="public/img/Logos_Banners/adm.png" alt="" width="270" height="80"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse md-pt-4 mdx-5 lg-pt-1 sm-pt-5" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= constant('URL')?>login">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>