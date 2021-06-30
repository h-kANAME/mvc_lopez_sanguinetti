<?php
include_once('inc/header.php');
include_once('inc/con_db.php');

?>

<body class="backdark">
    <div class="container text-center my-5">
        <di class="row">
            <div class="col-md-12">

                <form action='#' method="post">

                    <h1 class="card-header bg-primary text-white">Edicion</h1>
                    <br>
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT usuarios.usuario as usuario, usuarios_tipos.nombre AS tipo, usuarios.activo
                            FROM usuarios, usuarios_tipos
                            WHERE usuarios.tipo = usuarios_tipos.id_tipo
                            ORDER BY usuarioS.usuario ASC";
                            $respuesta = $connect->query($query);
                            foreach ($respuesta as $row) {

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
                                    <th scope="row"><?php echo $usuario ?></th>
                                    <td><?php echo $tipo ?></td>
                                    <td><?php echo $estado ?></td>
                                    <td>
                                    <button class="btn btn-sm btn-success btn-block" type="submit" name="login">Activar</button>
                                    <button class="btn btn-sm btn-danger btn-block" type="submit" name="login">Desactivar</button>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>



                </form>


            </div>
    </div>
    </div>
</body>