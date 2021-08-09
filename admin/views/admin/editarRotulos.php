<?php
include_once('inc/header.php');
include_once('inc/con_db.php');

echo $_POST['id_marca'] . '<br>';
echo $_POST['nombre'] . '<br>';
echo $_POST['estado'] . '<br>';

die();
?>

<body class="backdark">
    <div class="container my-5">
        <div class="row">

            <div class="col-md-12 text-white">
                <form class="table-bordered border-primary" action='<?php  //echo constant('URL'); ?>gestionComentarios/aprobarComentario' method="POST">
                    <h3 class="card-title col mb-3 text-center">Gestion de Marcas</h3>

                    <div class="col mb-3">
                        <table class="table text-center text-white">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $query = "SELECT * FROM marcas";
                                    $request = $connect->query($query);
                                    if ($request) {
                                        foreach ($request as $row) {
                                    ?>
                                            <td><?php echo $row['id_marca'] . '<br>' ?></td>
                                            <td><?php echo $row['nombre'] . '<br>' ?></td>
                                            <td><?php if($row['estado_activo'] == 1){ echo  'Activo';}else{echo 'Inactivo';} ?></td>
                                            <td><button class="btn btn-sm btn-warning btn-block" name="id_marca" value="<?php echo $row['id_marca'] ?>" type="submit">Gestionar</button></td>
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

            </div>

        </div>
    </div>
</body>