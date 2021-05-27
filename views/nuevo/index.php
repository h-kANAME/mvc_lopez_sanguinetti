<!DOCTYPE html>
<html lang="es">

<head>
    <title>Nuevo Alumno</title>
</head>

<body>

    <?php require 'views/header.php'; ?>

    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Seccion Nuevo Alumno</h2> </br>
                <div><?php echo $this->mensaje; ?></div></br>
                <form class="text-center" action='<?php echo constant('URL'); ?>nuevo/insertarAlumno' method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" required />
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" required />
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" id="email" required />
                    </div>
                    <div class="form-group">
                        <label for="img">Img</label>
                        <input type="text" name="img" id="img" required />
                    </div>

                    <input type="submit" value="Agregar" />
                </form>
            </div>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>

</body>

</html>