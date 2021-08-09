<?php
include_once('inc/header.php');
include_once('inc/con_db.php');
?>

<body class="backdark">
    <div class="container my-5">
        <div class="row">

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='editarRotulos' method="POST">
                    <h3 class="card-title col mb-3 text-center">Gestion de Marcas</h3>

                    <div class="col mb-3">
                        <table class="table text-center text-white">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Estado Actual</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT * FROM marcas";
                                    $request = $connect->query($query);

                                    foreach ($request as $row) {

                                        $id_marca = $row['id_marca'];
                                        $nombre = $row['nombre'];
                                        $estado_activo = $row['estado_activo'];
                                    ?>
                                        <th><?php echo $row['id_marca'] ?></th>
                                        <th><?php echo $nombre ?></th>
                                        <th><?php if ($estado_activo == 1) {
                                                echo  'Activo';
                                            } else {
                                                echo 'Inactivo';
                                            } ?></th>
                                        <th><button class="btn btn-sm btn-warning btn-block" name="id_marca" value="<?php echo $id_marca ?>" type="submit">Gestionar</button></th>
                                </tr>
                            <?php
                                    }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='<?php echo constant('URL'); ?>gestionRotulos/crearMarca' method="POST">
                    <h3 class="card-title col mb-3 text-center">Dar de alta una Marca</h3>

                    <div class="col mb-3">
                        <table class="table text-center text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="text-center" name="nombre" type="text">
                                    </td>
                                    <td><button class="btn btn-sm btn-success btn-block" type="submit">Agregar</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>


        </div>
    </div>
    <!-- Categorias -->

    <div class="container my-5">
        <div class="row">

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='editarRotulos' method="POST">
                    <h3 class="card-title col mb-3 text-center">Gestion de Categorias</h3>

                    <div class="col mb-3">
                        <table class="table text-center text-white">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Estado Actual</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT * FROM categorias";
                                    $request = $connect->query($query);

                                    foreach ($request as $row) {

                                        $id_categoria = $row['id_categoria'];
                                        $nombre = $row['nombre'];
                                        $estado_activo = $row['estado_activo'];
                                    ?>
                                        <th><?php echo $row['id_categoria'] ?></th>
                                        <th><?php echo $nombre ?></th>
                                        <th><?php if ($estado_activo == 1) {
                                                echo  'Activo';
                                            } else {
                                                echo 'Inactivo';
                                            } ?></th>
                                        <th><button class="btn btn-sm btn-warning btn-block" name="id_categoria" value="<?php echo $id_categoria ?>" type="submit">Gestionar</button></th>
                                </tr>
                            <?php
                                    }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='<?php echo constant('URL'); ?>gestionRotulos/crearCategoria' method="POST">
                    <h3 class="card-title col mb-3 text-center">Dar de alta una Categoria</h3>

                    <div class="col mb-3">
                        <table class="table text-center text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="text-center" name="nombre" type="text">
                                    </td>
                                    <td><button class="btn btn-sm btn-success btn-block" type="submit">Agregar</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <!-- Sub Categorias -->

    <div class="container my-5">
        <div class="row">

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='editarRotulos' method="POST">
                    <h3 class="card-title col mb-3 text-center">Gestion de Sub Categorias</h3>

                    <div class="col mb-3">
                        <table class="table text-center text-white">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Estado Actual</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT * FROM sub_categorias";
                                    $request = $connect->query($query);

                                    foreach ($request as $row) {

                                        $id_categoria = $row['id_sub_categoria'];
                                        $nombre = $row['nombre'];
                                        $estado_activo = $row['estado_activo'];
                                    ?>
                                        <th><?php echo $row['id_sub_categoria'] ?></th>
                                        <th><?php echo $nombre ?></th>
                                        <th><?php if ($estado_activo == 1) {
                                                echo  'Activo';
                                            } else {
                                                echo 'Inactivo';
                                            } ?></th>
                                        <th><button class="btn btn-sm btn-warning btn-block" name="id_sub_categoria" value="<?php echo $id_sub_categoria ?>" type="submit">Gestionar</button></th>
                                </tr>
                            <?php
                                    }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='<?php echo constant('URL'); ?>gestionRotulos/crearSubCategoria' method="POST">
                    <h3 class="card-title col mb-3 text-center">Dar de alta una Sub Categoria</h3>

                    <div class="col mb-3">
                        <table class="table text-center text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="text-center" name="nombre" type="text">
                                    </td>
                                    <td><button class="btn btn-sm btn-success btn-block" type="submit">Agregar</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>


        </div>
    </div>


</body>