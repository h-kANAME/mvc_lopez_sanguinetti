<?php
include_once('inc/con_db.php');
include_once('inc/header.php');
?>


<title>Aministrador de Sitio</title>

<body class="backdark">

<div class="container">
    <div class="row">
        <div class="col text-center">
            <img src="../img/Logos_Banners/adm.png" alt="">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col mb-3 text-white">
            <div class="table-bordered border-primary">
                <div class="card-header">
                    <h5 class="text-center">Acciones</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <a class="link" href="#">
                        <li class="list-group-item bg-dark">ADM - Productos</li>
                    </a>
                    <a class="link" href="#">
                        <li class="list-group-item bg-dark">ADM - Marcas</li>
                    </a>
                    <a class="link" href="#">
                        <li class="list-group-item bg-dark">ADM - Categorias</li>
                    </a> <a class="link" href="#">
                        <li class="list-group-item bg-dark">ADM - Sub Categorias</li>
                    </a>
                    <a class="link" href="#">
                        <li class="list-group-item bg-dark">ADM - Comentarios</li>
                    </a>

                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <form class="table-bordered border-primary" action="gestionProductos.php" method="post">
                <h4 class="card-header text-center text-white">Gestion de Productos</h4>
                <table class="table text-center text-white">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Edicion-Alta</th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM productos ORDER BY 'ASC'";
                        $respuesta = $connect->query($query);

                        if ($respuesta) {
                            foreach ($respuesta as $row) {
                                //  $producto = $row['modelo'];
                        ?>

                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id_producto'] ?></td>
                            <td><?php echo $row['modelo'] ?></td>

                            <td><button class="btn btn-success" name="productoID" value="<?php echo $row['id_producto'] ?>" type="submit">Administrar</button></td>
                        </tr>
                    </tbody>
            <?php
                            }
                        }
            ?>
                </table>
            </form>

        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form class="table-bordered border-primary">
                <h4 class="card-header text-center text-white">Gestion de Marcas</h4>
                <table class="table text-center text-white">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Edicion-Alta</th>
                        </tr>
                        <?php
                        $query = "SELECT* FROM marcas ORDER BY 'ASC'";
                        $respuesta = $connect->query($query);

                        if ($respuesta) {
                            foreach ($respuesta as $row) {
                                if ($row['estado_activo'] == 1) {
                                    $estado = 'Activo';
                                } else {
                                    $estado = 'Inactivo';
                                }
                        ?>

                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id_marca'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $estado ?></td>
                            <td><button class="btn btn-success text-white">Administrar</button></td>
                        </tr>
                    </tbody>
            <?php
                            }
                        }
            ?>
                </table>
            </form>

        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form class="table-bordered border-primary">
                <h4 class="card-header text-center text-white">Gestion de Categorias</h4>
                <table class="table text-center text-white">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Edicion-Alta</th>
                        </tr>
                        <?php
                        $query = "SELECT* FROM categorias ORDER BY 'ASC'";
                        $respuesta = $connect->query($query);

                        if ($respuesta) {
                            foreach ($respuesta as $row) {
                                if ($row['estado_activo'] == 1) {
                                    $estado = 'Activo';
                                } else {
                                    $estado = 'Inactivo';
                                }
                        ?>

                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id_categoria'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $estado ?></td>
                            <td><button class="btn btn-success text-white">Administrar</button></td>
                        </tr>
                    </tbody>
            <?php
                            }
                        }
            ?>
                </table>
            </form>

        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form class="table-bordered border-primary">
                <h4 class="card-header text-center text-white">Gestion de Sub Categorias</h4>
                <table class="table text-center text-white">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Edicion-Alta</th>
                        </tr>
                        <?php
                        $query = "SELECT* FROM sub_categorias ORDER BY 'ASC'";
                        $respuesta = $connect->query($query);

                        if ($respuesta) {
                            foreach ($respuesta as $row) {
                                if ($row['estado_activo'] == 1) {
                                    $estado = 'Activo';
                                } else {
                                    $estado = 'Inactivo';
                                }
                        ?>

                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id_sub_categoria'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $estado ?></td>
                            <td><button class="btn btn-success text-white">Administrar</button></td>
                        </tr>
                    </tbody>
            <?php
                            }
                        }
            ?>
                </table>
            </form>

        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <form class="table-bordered border-primary">
                <h4 class="card-header text-center text-white">Gestion de Mensajes</h4>
                <table class="table text-center text-white">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Mensaje</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        <?php
                        $query = "SELECT* FROM comentarios ORDER BY 'ASC'";
                        $respuesta = $connect->query($query);

                        if ($respuesta) {
                            foreach ($respuesta as $row) {
                        ?>

                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id_comentario'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><button class="btn btn-success text-white">Administrar</button></td>
                        </tr>
                    </tbody>
            <?php
                            }
                        }
            ?>
                </table>
            </form>

        </div>
    </div>
</div>

</body>