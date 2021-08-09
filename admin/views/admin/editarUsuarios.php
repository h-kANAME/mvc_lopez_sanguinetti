<?php
include_once('inc/header.php');
include_once('inc/con_db.php');
$id_usuario = $_POST['id_usuario'];
?>

<body class="backdark">
    <div class="container text-center my-5">
        <di class="row">
            <div class="col-md-12">

                <form action='<?php echo constant('URL'); ?>login/userActivar' method="post">

                    <h1 class="card-header bg-primary text-white">Edicion</h1>
                    <br>
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Estado actual</th>
                                <th scope="col">Cambiar a</th>
                                <th scope="col">Visibilidad</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";
                            $respuesta = $connect->query($query);
                            foreach ($respuesta as $row) {

                                $id_usuario = $row['id_usuario'];
                                $usuario = $row['usuario'];

                                $estado = $row['activo'];

                                if ($estado == '0') {
                                    $estado = 'Inactivo';
                                } else if ($estado == '1') {
                                    $estado = 'Activo';
                                }
                            ?>

                                <tr>
                                    <th scope="row">
                                        <select name="id_usuario">
                                            <option><?php echo $id_usuario ?></option>
                                        </select>
                                    </th>

                                    <th scope="row"><?php echo $usuario ?></th>
                                    <td><?php echo $estado ?></td>

                                    <td>
                                        <select name="activ" class="mdb-select md-form" required>
                                            <option>Activo</option>
                                            <option>Inactivo</option>
                                        </select>
                                    </td>

                                    <td>
                                    
                                        <select name="visibilidad">
                                            <?php
                                            $query = "SELECT * FROM visibilidad";
                                            $respuesta = $connect->query($query);

                                            foreach ($respuesta as $row) {
                                            ?>
                                                <option><?php echo $row['id_visibilidad'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </td>

                                    <td>
                                        <button class="btn btn-sm btn-success btn-block" type="submit">Cambiar</button>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
    </div>

    <div>

        <div class="container md-3 my-1">
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true">Referencia Visibilidad</li>
                <table class="table text-center text-white">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Codigo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $query = "SELECT * FROM visibilidad";
                            $respuesta = $connect->query($query);
                            foreach ($respuesta as $row) {
                            ?>

                                <th scope="row"><?php echo $row['nombre'] ?></th>
                                <td><?php echo $row['id_visibilidad'] ?></td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tbody>
                </table>
            </ul>
        </div>

    </div>

    </div>
</body>