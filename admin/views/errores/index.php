<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ruta: Error</title>
</head>

<body>

    <?php require 'views/header.php'; ?>
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center"> <b>ERROR 404! <?= $this->mensaje; ?></b></h1>
            </div>
        </div>
    </div>

    <?php //require 'views/footer.php'; ?>

</body>

</html>