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

                <form class="my-3 table-bordered border-primary" method="post" action='<?php echo constant('URL'); ?>agregarCampos/editarProducto'>
                    <h3 class="card-title col mb-3 text-center">Editar Producto</h3>

                    <?php
                    $query = "SELECT * FROM productos WHERE id_producto = $id_producto";
                    $request =  $connect->query($query);

                    foreach ($request as $row) {
                    }
                    ?>
                    <div class="col mb-3">
                        <table class="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Modelo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">S. Categoria</th>
                                    <th scope="col">Marca</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-white">
                                    <td><input name="id_producto" class="text-center" type="text" value="<?php echo $id_producto ?>"></td>
                                    <td><input name="modelo" class="text-center" type="text" value="<?php echo $row['modelo'] ?>"></td>
                                    <td><input name="descripcion" class="text-center" type="text" value="<?php echo $row['descripcion'] ?>"></td>
                                    <td><input name="precio" class="text-center" type="text" value="<?php echo $row['precio'] ?>"></td>


                                    <th class="text-center" scope="row">
                                        <select name="categorias" required>
                                            <?php
                                            $query = "SELECT * FROM categorias";
                                            $respuesta = $connect->query($query);
                                            foreach ($respuesta as $row) {
                                            ?>
                                                <option> <?php echo $row['id_categoria'] ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </th>

                                    <th class="text-center" scope="row">
                                        <select name="sub_categorias" required>
                                            <?php
                                            $query = "SELECT * FROM sub_categorias";
                                            $respuesta = $connect->query($query);
                                            foreach ($respuesta as $row) {
                                            ?>
                                                <option> <?php echo $row['id_sub_categoria'] ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </th>

                                    <th class="text-center" scope="row">
                                        <select name="marcas" required>
                                            <?php
                                            $query = "SELECT * FROM marcas";
                                            $respuesta = $connect->query($query);
                                            foreach ($respuesta as $row) {
                                            ?>
                                                <option> <?php echo $row['id_marca'] ?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success text-white link"><a class="activo" style="text-decoration:none; color:aliceblue;">Aplicar Cambios</button>
                    </div>

                </form>

                <div class="col md-3 my-1">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Referencia Categorias</li>
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
                                    $query = "SELECT * FROM categorias WHERE estado_activo = 1";
                                    $respuesta = $connect->query($query);
                                    foreach ($respuesta as $row) {
                                    ?>

                                        <th scope="row"><?php echo $row['nombre'] ?></th>
                                        <td><?php echo $row['id_categoria'] ?></td>
                                </tr>
                            <?php
                                    }
                            ?>
                            </tbody>
                        </table>
                    </ul>
                </div>

                <div class="col md-3 my-1">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Referencia Sub Categorias</li>
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
                                    $query = "SELECT * FROM sub_categorias WHERE estado_activo = 1";
                                    $respuesta = $connect->query($query);
                                    foreach ($respuesta as $row) {
                                    ?>

                                        <th scope="row"><?php echo $row['nombre'] ?></th>
                                        <td><?php echo $row['id_sub_categoria'] ?></td>
                                </tr>
                            <?php
                                    }
                            ?>
                            </tbody>
                        </table>
                    </ul>
                </div>

                <div class="col md-3">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-current="true">Referencia Marcas</li>
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
                                    $query = "SELECT * FROM marcas WHERE estado_activo = 1";
                                    $respuesta = $connect->query($query);
                                    foreach ($respuesta as $row) {
                                    ?>

                                        <th scope="row"><?php echo $row['nombre'] ?></th>
                                        <td><?php echo $row['id_marca'] ?></td>
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

                <form method="post" class="my-3 table-bordered border-primary" action='<?php echo constant('URL'); ?>agregarCampos/activarProducto'>
                    <h3 class="card-title col mb-3 text-center">Cambio de Estados</h3>

                    <div class="col mb-3">
                        <table class="table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cambiar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="text-center text-white">
                                    <?php
                                    $productos = "SELECT * FROM productos WHERE id_producto = $id_producto";
                                    $request =  $connect->query($productos);

                                    foreach ($request as $row) {

                                    ?>

                                        <td>
                                            <select name="id_producto" class="mdb-select md-form" required>
                                                <option name="<?php echo $row['id_producto']; ?>"><?php echo $row['id_producto'] ?></option>
                                            </select>
                                        </td>

                                        <td><?php echo $producto['modelo'] ?></td>

                                        <td><input class="text-center" type="text" value="<?php echo $row['estado_activo'] ?>" name="estado_activo"></td>

                                        <td><button type="submit" class="btn btn-success text-white link"><a class="activo" style="text-decoration:none; color:aliceblue;">Ok</button></td>

                                    <?php
                                    }
                                    ?>
                    </div>

                    </tr>
                    </tbody>
                    </table>
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
                <form class="my-3 table-bordered border-primary" method="post" action='<?php echo constant('URL'); ?>agregarCampos/productoNuevo'>
                    <h3 class="card-title col mb-3 text-center">Alta producto Nuevo</h3>
                    <div class="col mb-3">
                        <label class="form-label">Nombre</label>
                        <input name="modelo" type="text" class="form-control">
                    </div>

                    <div class="col mb-3">
                        <label class="form-label">Descripcion</label>
                        <input name="descripcion" type="text" class="form-control">
                    </div>

                    <div class="col mb-3">
                        <label class="form-label">Precio</label>
                        <input name="precio" type="text" class="form-control">
                    </div>

                    <div class="col mb-3">
                        <label class="form-label">Marca</label>
                        <select name="id_marca" required>
                            <?php
                            $query = "SELECT * FROM marcas WHERE estado_activo = 1";
                            $respuesta = $connect->query($query);
                            foreach ($respuesta as $row) {
                            ?>
                                <option> <?php echo $row['id_marca'] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label class="form-label">Categoria</label>
                        <select name="id_categoria" required>
                            <?php
                            $query = "SELECT * FROM categorias WHERE estado_activo = 1";
                            $respuesta = $connect->query($query);
                            foreach ($respuesta as $row) {
                            ?>
                                <option> <?php echo $row['id_categoria'] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label class="form-label">Sub Categoria</label>
                        <select name="id_sub_categoria" required>
                            <?php
                            $query = "SELECT * FROM sub_categorias WHERE estado_activo = 1";
                            $respuesta = $connect->query($query);
                            foreach ($respuesta as $row) {
                            ?>
                                <option> <?php echo $row['id_sub_categoria'] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col mb-3">
                        <label for="">Imagen pequeña</label>
                        <br>
                        <input name="archivo_imagen" type="file" id="archivo_imagen">
                    </div>

                    <div class="col mb-3">
                        <label for="">Imagen Grande</label>
                        <br>
                        <input name="archivo_imagen_max" type="file" id="archivo_imagen_max">
                    </div>

                    <div class="col mb-3">
                        <button class="btn btn-success text-white">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>