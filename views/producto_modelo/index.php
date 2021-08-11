<?php
include_once 'models/ProductoModelo.php';
include_once 'con_db.php';
$PAGINA_LISTADO = 'producto_modelo';
require 'views/header.php';
include_once('config/con_db.php');

$id_producto = $_REQUEST['id_producto'];

include_once "models/producto_modeloModelo.php";

foreach ($this->productos as $row) {
    if ($row->id_producto == $id_producto) {

?>
        <div class="container">
            <div class="text-center">
                <div class="card body bg-dark col-6 mt-5 mx-auto">
                    <img src="<?php echo $row->imagen ?>" class="card-img-top my-3" alt="...">

                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title text-warning"><?php echo $row->modelo ?></h5>
                                </div>
                                <div class="col-md-6">
                                    <p class="card-text text-warning lead">$<?php echo  $row->precio ?></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title text-warning">Ranqueo</h5>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    $query = "SELECT productos.id_producto, productos.descripcion, productos.id_marca, productos.id_categoria, productos.modelo, productos.destacado, productos.precio, productos.imagen, productos.imagen_max, productos.id_sub_categoria, productos.estado_activo, 
                                    productos.modelo AS Producto, productos.id_producto AS Id, SUM(comentarios.calificacion) / COUNT(comentarios.calificacion) AS Ranqueo, comentarios.descripcion AS Comentario
                                                    
                                                    
                                                    FROM productos, comentarios, productos_campo_dinamico d    
                                                    WHERE productos.id_producto = comentarios.id_producto
                                                    AND productos.estado_activo = 1
                                                    AND productos.id_producto = $id_producto
                                                    GROUP BY productos.modelo
                                                    ORDER BY productos.modelo";
                                    $respranq = $connect->query($query);

                                    foreach ($respranq as $r) {
                                        $ranqueo = $r['Ranqueo'];
                                    }

                                    ?>
                                    <p class="card-text text-warning lead"><?php echo ' ★ ' . number_format($ranqueo) . '/5' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <table class="table table-striped cardMainColor">
                            <thead>
                                <tr>
                                    <td scope="col" class="text-warning">Descripcion: </td>
                                    <td class="text-warning"><?php echo $row->descripcion ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <?php
                                    $query = "SELECT d.id_producto_campo_dinamico, d.value
                      
                                    FROM productos, productos_campo_dinamico d          
                                    WHERE productos.id_producto = d.id_producto
                                    AND D.estado_activo = 1
                                    AND productos.id_producto = $row->id_producto";

                                    $respuesta = $connect->query($query);
                                    $contador = 0;

                                    foreach ($respuesta as $row) {

                                        $contador++;
                                    ?>

                                        <td class="text-warning">Caracteristica N°<?php echo $contador ?> </td>
                                        <td class="text-warning"><?php echo $row['value'] ?></td>

                                </tr>
                            <?php
                                    }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col">
                            <form name="form" method="POST" action="">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Tu email" required>
                                </div>

                                <?php
                                $query = "SELECT comentarios_campo_dinamico.nombre, comentarios_campo_dinamico.value, comentarios_campo_dinamico.type, comentarios_campo_dinamico.palabras 
                                    FROM comentarios_campo_dinamico, productos, comentarios
                                    WHERE comentarios_campo_dinamico.id_producto = productos.id_producto
                                    AND comentarios_campo_dinamico.activo = 1
                                    AND productos.id_producto = $id_producto
                                    GROUP BY comentarios_campo_dinamico.nombre";

                                $dinamic = $connect->query($query);

                                ?>

                                <div class="form-group">
                                    <h5 class="text-warning">Tambien me interesa</h5>
                                    <select name="datoDinamico">
                                        <?php
                                        foreach ($dinamic as $row) {

                                            if (isset($row['nombre']) && isset($row['value']) && isset($row['type'])) {
                                                $palabras = $row['palabras'];
                                                do {
                                                    $extracValue = explode(",", $row['value']);
                                        ?>
                                                    <option><?php echo $value =  $extracValue[$palabras] ?></option>

                                        <?php
                                                    $palabras--;
                                                } while ($palabras > 0);
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>


                                <textarea class="form-control" name="descripcion" rows="6" placeholder="Tu comentario..." required></textarea>
                                <div class="form-group my-3">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="califaicacion">
                                                    <option value="★">*</option>
                                                    <option value="★★">**</option>
                                                    <option value="★★★">***</option>
                                                    <option value="★★★★">****</option>
                                                    <option value="★★★★★">*****</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-6">

                                                <input type="submit" name="comentar" class="btn btn-success" onclick="$aBase()">
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

        if (isset($_REQUEST['email']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['califaicacion'])) {
            $fecha = date('Y-m-d');
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $email = $_REQUEST['email'];
            $comentario = $_REQUEST['descripcion'];
            $califaicacion = $_REQUEST['califaicacion'];
            $ipActual = 124; //$_SERVER['REMOTE_ADDR'];
            $estado = 0;
            $datoDinamico = '';

            // if (isset($row)) {
            // echo 'Usted no puede realizar mas de un comentario por dia';
            // } 
            //else {

            if (isset($_REQUEST['datoDinamico'])) {
                $datoDinamico = $_REQUEST['datoDinamico'];
            }

            $sql = "INSERT INTO comentarios (id_comentario, fecha, ip, id_producto, descripcion, seleccion_dinamica ,calificacion, email, aprobado) VALUES (NULL, '$fecha', $ipActual, '$id_producto', '$comentario', '$datoDinamico' ,'$califaicacion', '$email', '$estado');";
            $submit = $connect->exec($sql);

            echo '<div class="text-center my-3"> <h5>Comentario enviado, aguarda aprobacion del administrador</h5> </div>';

            if ($submit) {
                echo '<div class="text-center my-3"> <h5>' . $fecha . '</h5> </div>';
            }
        }



        if (isset($_REQUEST[''])) {
        }

        ?>

        <div class="container">
            <div class="text-center">
                <h2 class="mt-4 mb-4">Comentarios</h2>
                <?php

                $query = "SELECT * FROM comentarios ORDER BY fecha DESC";
                $resultado = $connect->query($query);
                if ($resultado) {
                    foreach ($resultado as $row) {

                        if ($row['aprobado'] > 0 && $id_producto == $row['id_producto']) {

                            $comentarioF = $row["calificacion"];
                            if ($comentarioF == 0) {
                                $calificacion = '';
                            }
                            if ($comentarioF == 1) {
                                $calificacion = '★';
                            } else if ($comentarioF == 2) {
                                $calificacion = '★★';
                            } else if ($comentarioF == 3) {
                                $calificacion = '★★★';
                            } else if ($comentarioF == 4) {
                                $calificacion = '★★★★';
                            } else if ($comentarioF == 5) {
                                $calificacion = '★★★★★';
                            }

                            echo " <div class='card-body bg-secondary'>
							<h4> Comentario de: " . $row["email"] . "</h4>
							<p class='my-3'></p>
							
							<h5>" . $row["descripcion"] . "</h5>
                            <h5>" . 'Usuario interesado en : ' . $row["seleccion_dinamica"] . "</h5>
							<p class='my-3'></p>
							
							<h4><strong>Valoración: </strong> " . $calificacion . "</h4>
							<p class='my-3'></p>
							
							<p>" . $row["fecha"] . "</p>
							</div>";
                            echo '<br>';
                        }
                    }
                }
                ?>
            </div>
        </div>

<?php
    }
}
include_once('views/footer.php');
?>