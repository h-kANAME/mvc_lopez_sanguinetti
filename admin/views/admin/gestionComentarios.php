<?php
include_once('inc/header.php');
include_once('inc/con_db.php');

$query = "SELECT comentarios.id_comentario, comentarios.fecha, comentarios.ip, productos.modelo,
                 comentarios.descripcion, comentarios.calificacion, comentarios.email, comentarios.aprobado
          FROM   comentarios, productos
          WHERE  comentarios.id_producto = productos.id_producto
          AND    comentarios.aprobado = 0";
$request = $connect->query($query);


// if(isset($request['id_producto'])){

// }

?>
<body class="backdark">
<div class="container my-5">
    <div class="row">

        <div class="col-md-2 text-center"> <?php include_once('inc/sidebar.php'); ?> </div>

        <div class="col-md-10 text-white">
            <form class="table-bordered border-primary" action="" method="POST">
                <h3 class="card-title col mb-3 text-center">Gestion de Mensajes</h3>

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
                                <th scope="col">Aprobado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                if ($request) {
                                    foreach ($request as $comentario) {


                                ?>
                                        <td><?php echo $comentario['modelo'] . '<br>' ?></td>
                                        <td><?php echo $comentario['descripcion'] . '<br>' ?></td>
                                        <td><?php echo $comentario['ip'] . '<br>' ?></td>
                                        <td><?php echo $comentario['fecha'] . '<br>' ?></td>
                                        <td><?php echo $comentario['calificacion'] . '<br>' ?></td>
                                        <td><?php echo $comentario['email'] . '<br>' ?></td>
                                        <!-- <td><input class="text-center" type="text" value="<?php //echo $comentario['aprobado'] ?>"></td> -->
                                        <td> <button type="submit" class="btn btn-success text-white link"><a class="activo" style="text-decoration:none; color:aliceblue;" href="gestionComentarios?estado=1&productoID=<?php echo $comentario['id_comentario'] ?> <?php $_POST['id_comentario'] ?>">Activar</a></button></td>
                                        

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