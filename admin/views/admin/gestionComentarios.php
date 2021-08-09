<?php
include_once('inc/header.php');
include_once('inc/con_db.php');
?>

<body class="backdark">
    <div class="container my-5">
        <div class="row">

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='<?php echo constant('URL'); ?>gestionComentarios/aprobarComentario' method="POST">
                    <h3 class="card-title col mb-3 text-center">Comentarios pendientes de aprobacion</h3>

                    <div class="col mb-3">
                        <table class="table text-center text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Comentario</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Calificacion</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT comentarios.id_comentario, comentarios.fecha, comentarios.ip, productos.modelo,
                                                        comentarios.descripcion, comentarios.calificacion, comentarios.email, comentarios.aprobado
                                                FROM   comentarios, productos
                                                WHERE  comentarios.id_producto = productos.id_producto
                                                AND aprobado = 0";
                                    $request = $connect->query($query);
                                    if ($request) {
                                        foreach ($request as $comentario) {
                                    ?>
                                            <td><?php echo $comentario['modelo'] . '<br>' ?></td>
                                            <td><?php echo $comentario['descripcion'] . '<br>' ?></td>
                                            <td><?php echo $comentario['ip'] . '<br>' ?></td>
                                            <td><?php echo $comentario['fecha'] . '<br>' ?></td>
                                            <td><?php echo $comentario['calificacion'] . '<br>' ?></td>
                                            <td><?php echo $comentario['email'] . '<br>' ?></td>
                                            <td><button class="btn btn-sm btn-warning btn-block" name="id_comentario" value="<?php echo $comentario['id_comentario'] ?>" type="submit">Aprobar</button></td>
                                </tr>
                        <?php
                                        }
                                    }

                        ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='<?php echo constant('URL'); ?>gestionComentarios/desaprobarComentario' method="POST">
                    <h3 class="card-title col mb-3 text-center">Comentarios aprobados</h3>

                    <div class="col mb-3">
                        <table class="table text-center text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Comentario</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Calificacion</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT comentarios.id_comentario, comentarios.fecha, comentarios.ip, productos.modelo,
                                                     comentarios.descripcion, comentarios.calificacion, comentarios.email, comentarios.aprobado
                                                    FROM   comentarios, productos
                                                    WHERE  comentarios.id_producto = productos.id_producto
                                                    AND aprobado = 1";
                                    $request = $connect->query($query);
                                    if ($request) {
                                        foreach ($request as $comentario) {
                                    ?>
                                            <td><?php echo $comentario['modelo'] . '<br>' ?></td>
                                            <td><?php echo $comentario['descripcion'] . '<br>' ?></td>
                                            <td><?php echo $comentario['ip'] . '<br>' ?></td>
                                            <td><?php echo $comentario['fecha'] . '<br>' ?></td>
                                            <td><?php echo $comentario['calificacion'] . '<br>' ?></td>
                                            <td><?php echo $comentario['email'] . '<br>' ?></td>
                                            <td><button class="btn btn-sm btn-danger btn-block" name="id_comentario" value="<?php echo $comentario['id_comentario'] ?>" type="submit">Desaprobar</button></td>
                                </tr>
                        <?php
                                        }
                                    }

                        ?>
                            </tbody>
                        </table>
                    </div>

                </form>
            </div>

        </div>
    </div>
</body>