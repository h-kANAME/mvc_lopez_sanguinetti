<?php
include_once('inc/header.php');
include_once('inc/con_db.php');

if (isset($_POST['id_marca'])) {

    $id =  $_POST['id_marca'];

    $query = "SELECT * FROM marcas WHERE id_marca = '$id'";
    $request = $connect->query($query);
    foreach ($request as $row) {
        $nombre = $row['nombre'];
        $estado = $row['estado_activo'];
    }
} else if (isset($_POST['id_categoria'])) {
    $id =  $_POST['id_categoria'];

    $query = "SELECT * FROM categorias WHERE id_categoria = '$id'";
    $request = $connect->query($query);
    foreach ($request as $row) {
        $nombre = $row['nombre'];
        $estado = $row['estado_activo'];
    }
} else if (isset($_POST['id_sub_categoria'])) {
    $id =  $_POST['id_sub_categoria'];

    $query = "SELECT * FROM sub_categorias WHERE id_sub_categoria = '$id'";
    $request = $connect->query($query);
    foreach ($request as $row) {
        $nombre = $row['nombre'];
        $estado = $row['estado_activo'];
    }
}

if ($estado == 1) {
    $est = 'Activo';
} else {
    $est = 'Inactivo';
}

?>

<body class="backdark">
    <div class="container my-5">
        <div class="row">

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='<?php echo constant('URL'); ?>gestionRotulos/editarMarca' method="POST">
                    <h3 class="card-title col mb-3 text-center">Gestion de Rotulos</h3>

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

                                    <td>
                                        <select name="id_marca">
                                            <option><?php echo $id ?></option>
                                        </select>
                                    </td>
                                    <td><input class="text-center" name="nombre" type="text" value="<?php echo $nombre ?>"></td>
                                    <td><?php echo $est ?></td>
                                    <td>
                                        <select name="estado">
                                            <option>Activo</option>
                                            <option>Inactivo</option>
                                        </select>
                                    </td>
                                    <td><button class="btn btn-sm btn-warning btn-block" type="submit">Cambiar</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>