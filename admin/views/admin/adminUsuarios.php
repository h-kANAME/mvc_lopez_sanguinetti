<?php
include_once('inc/header.php');
?>


<div class="container text-center">
    <div class="row">
        <div class="col-md-6">


            <form action='<?php echo constant('URL'); ?>login/userAdd' method="post" class="my-5">

                <h1 class="card-header">Alta</h1>
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

        <div class="col-md-6">

            <form action='#' method="post" class="my-5">

                <h1 class="card-header">Edicion</h1>
                <br>
                <table class="table">
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