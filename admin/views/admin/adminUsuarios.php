<?php
include_once('inc/header.php');
?>

<body class="backdark">

    <div class="container text-center my-5">
        <di class="row">

            <div class="col-md-3">
                <?php include_once('inc/sidebar.php'); ?>
            </div>

            <div class="col-md-4">


                <form action='<?php echo constant('URL'); ?>login/userAdd' method="post">

                    <h1 class="card-header bg-primary text-white">Alta</h1>
                    <br>
                    <div class="form-group">
                        <p><input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                        <p><input type="text" class="form-control" name="apellido" placeholder="Apellido" required></p>
                        <p><input type="text" class="form-control" name="usuario" placeholder="Usuario" required></p>
                        <p><input type="password" class="form-control" name="clave" placeholder="Clave" required></p>
                        <p><input type="text" class="form-control" name="tipo" placeholder="Tipo" required></p>
                        <p><input type="text" class="form-control" name="activo" placeholder="Estado" required></p>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Ingresar</button>
                    </div>
                </form>

            </div>

            <div class="col-md-4">

                <form action='#' method="post">

                    <h1 class="card-header bg-primary text-white">Edicion</h1>
                    <br>
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td>Tipo</td>
                                <td><button class="btn btn-sm btn-warning btn-block" type="submit" name="login">Editar</button></td>
                            </tr>
                        </tbody>
                    </table>



                </form>


            </div>
    </div>
    </div>
</body>