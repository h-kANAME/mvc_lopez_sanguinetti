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
                                    <th scope="col">Cambiar a</th>
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
                                        <th>
                                            <select name="id_marca">
                                                <option value="<?php echo $row['id_marca']?>"><?php echo $id_marca ?></option>
                                            </select>
                                        </th>

                                      <th> <input type="text" name="nombre" value="<?php echo $nombre ?>"></th>

                                        <th><?php if ($estado_activo == 1) {
                                                echo  'Activo';
                                            } else {
                                                echo 'Inactivo';
                                            } ?></th>

                                        <th>
                                            <select name="estado">
                                                <option>Activo</option>
                                                <option>Inactivo</option>
                                            </select>
                                        </th>

                                        <th><button class="btn btn-sm btn-warning btn-block"  type="submit">Gestionar</button></th>
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

            </div>

        </div>
    </div>
</body>