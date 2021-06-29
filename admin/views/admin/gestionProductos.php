<?php
include_once ('inc/header.php');
include_once ('inc/con_db.php');


$id_producto = $_POST['productoID'];

$query = "SELECT * FROM productos WHERE id_producto = $id_producto";
$request = $connect->query($query);

if ($request) {
    foreach ($request as $producto) {
    }
}
if (isset($_REQUEST['estado'])) {
    $estado = $_REQUEST['estado'];
    $query = "UPDATE productos SET estado_activo = '$estado' WHERE productos.id_producto = $id_producto;";
    $respuesuesta = $connect->exec($query);
    echo 'Estado: ' . $estado;
}
if (isset($producto['estado_activo']) && $producto['estado_activo'] == 1) {
    $stat = 'Activo';
} else {
    $stat = 'Inactivo';
    echo 'Estado: ' . $stat;
}

?>

<body class="backdark">
<div class="container">
    <div class="row">
        <div class="col text-center">
            <img src="../img/Logos_Banners/masterProductos.png" alt="">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-white">
            <form class="my-3 table-bordered border-primary" action="" method="post">
                <h3 class="card-title col mb-3 text-center">Modificar Campos</h3>
                <div class="col mb-3">
                    <label class="form-label">Editar nombre</label>
                    <input type="text" class="form-control" value="<?php echo $producto['modelo'] ?>">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Editar descripcion</label>
                    <input type="text" class="form-control" value="<?php echo $producto['descripcion'] ?>">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Editar Precio</label>
                    <input type="text" class="form-control" value="<?php echo $producto['precio'] ?>">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Editar Categoria</label>
                    <input type="text" class="form-control" value="<?php echo $producto['id_categoria'] ?>">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Editar Marca</label>
                    <input type="text" class="form-control" value="<?php echo $producto['id_marca'] ?>">
                </div>

                <div class="col mb-3">
                    <td><button class="btn btn-success" name="productoID" value="<?php echo $producto['id_producto'] ?>" type="submit">Actualizar</button></td>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-white">

            <form method="post" class="my-3 table-bordered border-primary">
                <h3 class="card-title col mb-3 text-center">Cambio de Estados</h3>

                <div class="col mb-3">
                    <table class="table">
                        <thead class="table-dark text-center">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Estado Actual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center text-white">
                                <th scope="row"><?php echo $producto['id_producto'] ?></th>
                                <td><?php echo $producto['modelo'] ?></td>
                                <td class="text-white"><?php echo $stat ?></td>
                </div>

                </tr>
                </tbody>
                </table>
        </div>
        <div class="text-center col mb-3">
            <button type="submit" class="btn btn-success text-white link"><a class="activo" style="text-decoration:none; color:aliceblue;" href="gestionProductos?estado=1&productoID=<?php echo $id_producto ?> <?php $_POST['productoID'] ?>">Activar</a></button>

            <button type="submit" class="btn btn-danger text-white link"><a class="activo" style="text-decoration:none; color:aliceblue;" href="gestionProductos?estado=0&productoID=<?php echo $id_producto ?>">Desactivar</a></button>

            <?php

            ?>
        </div>
        </form>

        <?php

        ?>

    </div>
</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-white">
            <form class="my-3 table-bordered border-primary" action="" method="post">
                <h3 class="card-title col mb-3 text-center">Alta producto Nuevo</h3>
                <div class="col mb-3">
                    <label class="form-label">Nombre del produccto</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Descripcion del producto</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Editar Precio</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Precio Producto</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Seleccionar Marca</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Seleccionar Categoria</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Seleccionar sub Categoria</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col mb-3">
                    <label class="form-label">Deseo dar de alta el producto en estado..</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col mb-3">
                    <button class="btn btn-success text-white">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>