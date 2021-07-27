<?php
include_once('inc/header.php');
include_once('inc/con_db.php');

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

$query = "SELECT * from campos_dinamicos";
$camposDinamicos = $connect->query($query);




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

                <form method="post" class="my-3 table-bordered border-primary" action='<?php echo constant('URL'); ?>agregarCampos/activarCampos'>
                    <h3 class="card-title col mb-3 text-center">Caracteristicas Agregadas</h3>

                    <div class="col mb-3">
                        <table class="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Caracteristica</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cambiar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $caracteristicas = "SELECT * FROM productos_campo_dinamico WHERE id_producto = $id_producto";
                                $request =  $connect->query($caracteristicas);
                                //Agregar tooltip para informar que 0 = inativo y 1 = activo
                                if ($request) {

                                    foreach ($request as $row) {
                                ?>

                                        <tr class="text-center text-white">

                                            <th scope="row">

                                                <select name="id_producto_campo_dinamico" class="mdb-select md-form" required>
                                                    <option name="<?php echo $row['id_producto_campo_dinamico'] ?>"><?php echo $row['id_producto_campo_dinamico'] ?></option>
                                                </select>

                                            </th>

                                            <td><?php echo $row['value'] ?></td>
                                            <td><input class="text-center" type="text" value="<?php echo $row['estado_activo'] ?>" name="estado_activo"></td>
                                            <td><button type="submit" class="btn btn-success text-white link"><a class="activo" style="text-decoration:none; color:aliceblue;">Ok</button></td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>


            </div>
            </form>

        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">
                <form class="my-3 table-bordered border-primary" action='<?php echo constant('URL'); ?>agregarCampos/agregarCampos' method="post">
                    <h3 class="card-title col mb-3 text-center">Campo Dinamico Productos</h3>

                    <div class="col mb-3">
                        <table class="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Campo</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Value</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="text-center text-white">

                                    <td>
                                        <select name="id_producto" class="mdb-select md-form" required>
                                            <option name="<?php echo $id_producto ?>"><?php echo $id_producto ?></option>
                                        </select>
                                    </td>

                                    <td>
                                        <select name="campos" class="mdb-select md-form" required>

                                            <?php foreach ($camposDinamicos as $campos) {

                                            ?>
                                                <option value="<?php echo $campos['tipo'] ?>" selected><?php echo $campos['nombre'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>

                                    <td>
                                        <input name="type" type="text">
                                    </td>

                                    <td>
                                        <input name="value" type="text">
                                    </td>
                    </div>

                    </tr>
                    </tbody>
                    </table>

            </div>
            <div class="col mb-3">
                <td><button class="btn btn-success" name="productoID" value="<?php echo $producto['id_producto'] ?>" type="submit">Agregar Caracteristica</button></td>
            </div>
        </div>
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



    <!-- Productos campo dinamico open-->

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">

                <form method="post" class="my-3 table-bordered border-primary" action='<?php echo constant('URL'); ?>agregarCampos/activarCamposComentarios'>
                    <h3 class="card-title col mb-3 text-center">Habilitar campo dinamico Comentarios</h3>

                    <div class="col mb-3">
                        <table class="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Caracteristica</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cambiar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $machete = "INSERT INTO comentarios_campo_dinamico (id_comentario_campo_dinamico, id_producto, value, type, estado_activo)
                                            VALUES (NULL, '16', 'Licencia 6 meses, Licencia 12 meses, Licencia Ilimitada', '3', '0')";

                                $consulta = "SELECT comentarios_campo_dinamico.id_comentario_campo_dinamico, comentarios_campo_dinamico.value, comentarios_campo_dinamico.type, comentarios_campo_dinamico.estado_activo        
                                             FROM comentarios_campo_dinamico, productos
                                             WHERE productos.id_producto = comentarios_campo_dinamico.id_producto
                                             AND productos.id_producto = $id_producto";

                                $request =  $connect->query($consulta);


                                if ($request) {

                                    foreach ($request as $row) {
                                ?>

                                        <tr class="text-center text-white">

                                            <th scope="row">

                                                <select name="id_comentario_campo_dinamico" class="mdb-select md-form" required>
                                                    <option name="<?php echo $row['id_comentario_campo_dinamico'] ?>"><?php echo $row['id_comentario_campo_dinamico'] ?></option>
                                                </select>

                                            </th>

                                            <td><?php echo $row['value'] ?></td>
                                            <td><input class="text-center" type="text" value="<?php echo $row['estado_activo'] ?>" name="estado_activo"></td>
                                            <td><button type="submit" class="btn btn-success text-white link"><a class="activo" style="text-decoration:none; color:aliceblue;">Ok</button></td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>


            </div>
            </form>

        </div>
    </div>

    <!-- close -->

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

                        <input type="file" id="archivo" name="archivo">
                    </div>

                    <div class="col mb-3">
                        <button class="btn btn-success text-white">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>