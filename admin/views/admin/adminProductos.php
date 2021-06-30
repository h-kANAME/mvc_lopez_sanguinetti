<?php
include_once('inc/header.php');
include_once('inc/con_db.php');
?>

<body class="backdark">
<div class="container my-5">
    <div class="row">

        <!-- <div class="col-md-9">
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
                        /*
                    include_once ("models/adminProductosModelo.php");
                    
                    
                    foreach ($productos as $row) {

                        $producto = new Productos();
                        $producto = $row;

                        
                        ?>

                    </thead>
                    <tbody>
                        <tr>
                            <td><?php // echo $producto->id_producto ?></td>
                            <td><?php // echo $producto->modelo ?></td>

                            <td><button class="btn btn-success" name="productoID" value="<?php // echo $producto->id_producto?>" type="submit">Administrar</button></td>
                        </tr>
                    </tbody>
            <?php
                            }
                    */
                        ?>
                </table>
            </form>

        </div> -->

        <div class="col-md-12">
            <form class="table-bordered border-primary" action="gestionProductos" method="post">
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


</div>

<div class="container">
    <div class="row">

         <div class="col-md-12 text-white">
            <form class="my-3 table-bordered border-primary" action="" method="post">
                <h3 class="card-title col mb-3 text-center">Alta producto</h3>
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