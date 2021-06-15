<!DOCTYPE html>
<html lang="es">

<head>
    <title>Contacto</title>
</head>

<body class="backdark">

    <?php
    require 'views/header.php';
    require 'views/admin/inc/con_db.php';
    $query = "SELECT * FROM contacto";
    $respuesta = $connect->query($query);
    ?>

    <div class="container my-5">
        <div class="row">
            <div class="col -md-9">
                <div class="card embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8600.05626199281!2d-58.407958880399335!3d-34.6039793409523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccaea670d4e67%3A0x2198c954311ad6d9!2sDa%20Vinci!5e0!3m2!1ses-419!2sar!4v1601010012241!5m2!1ses-419!2sar" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col 12">
                <h3 class="w-responsive mx-auto my-3 text-white">Contáctenos</h3>
            </div>
        </div>
    </div>

    <!--Arranca formulario-->
    <div class="container py-3">
        <div class="row">
            <div class="col-md-9 mb-md-0 mb-5">
                <form method="POST" action="envios.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <input name="apellido" type="text" class="form-control" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <input name="telefono" type="text" class="form-control" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <input name="correo" type="email" class="form-control" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group">

                        <select name="area" class="mdb-select md-form">
                            <option value="0" selected>Área que desea contactar</option> <!-- fixed eliminando "disabled" -->
                            <?php
                            foreach ($respuesta as $contactos) {
                                echo '<option value="' . $contactos['id_sector'] . '">' . $contactos['nombre_sector'] . '</option>';
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <textarea placeholder="Escribe Mensaje" class="form-control" name="mensaje" id="mensaje" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" id="archivo" name="archivo">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require 'views/footer.php'; ?>

</body>

</html>