<?php
include_once('inc/header.php');
include_once('inc/con_db.php');
?>

<body class="backdark">

    <div class="container text-center my-5">
        <di class="row">

            <div class="col-md-6">


                <form action='<?php echo constant('URL'); ?>login/userAdd' method="post">
                    <h1 class="card-header bg-primary text-white">Alta</h1>
                    <br>
                    <div class="form-group">
                        <p><input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                        <p><input type="text" class="form-control" name="apellido" placeholder="Apellido" required></p>
                        <p><input type="text" class="form-control" name="usuario" placeholder="Usuario" required></p>
                        <p><input type="password" class="form-control" name="clave" placeholder="Clave" required></p>
                    </div>

                    <div class="form-group">
                        <label class="form-group text-white" for="">Seleccionar tipo de usuario</label>
                        <select name="tipo" class="form-control" required>

                            <?php
                            $query = "SELECT * from usuarios_tipos";
                            $respuesta = $connect->query($query);

                            foreach ($respuesta as $row) {
                                $id_tipo = $row['id_tipo'];
                                $tipo = $row['nombre'];

                            ?>
                                <option value="<?php echo $id_tipo ?>"><?php echo $tipo ?></option>
                            <?php

                            }
                            ?>
                        </select>

                    </div>



                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Agregar</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">

                <form action='editarUsuarios' method="post">

                    <h1 class="card-header bg-primary text-white">Edicion</h1>
                    <br>
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT usuarios.id_usuario AS id_usuario ,usuarios.usuario as usuario, usuarios_tipos.nombre AS tipo, usuarios.activo
                            FROM usuarios, usuarios_tipos
                            WHERE usuarios.tipo = usuarios_tipos.id_tipo
                            ORDER BY usuarioS.usuario ASC";
                            $respuesta = $connect->query($query);
                            foreach ($respuesta as $row) {

                                $id_usuario = $row['id_usuario'];
                                $usuario = $row['usuario'];
                                $tipo = $row['tipo'];
                                $estado = $row['activo'];

                                if ($estado == '0') {
                                    $estado = 'Inactivo';
                                } else if ($estado == '1') {
                                    $estado = 'Activo';
                                }
                            ?>

                                <tr>
                                    <th><input type="text" name="id_usuario" value="<?php echo $id_usuario?>"></th>
                                    <th name="usuario"><?php echo $usuario ?></th>
                                    <td name="tipo"><?php echo $tipo ?></td>
                                    <td name="estado"><?php echo $estado ?></td>
                                    <td><button class="btn btn-sm btn-warning btn-block" type="submit" name="login">Editar</button></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>



                </form>


            </div>
    </div>
    </div>
</body>