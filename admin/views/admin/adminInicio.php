<?php
include_once('inc/header.php');
session_start();
?>
<title>Aministrador de Sitio</title>

<body class="backdark">

    <div class="container my-3">
        <div class="row">
            <div class="col text-center">
                <h5 class="text-right text-white">Bienvenido <?php echo $_SESSION['usuario']; ?></h5>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <?php include 'inc/sidebar.php'; ?>

            <div class="col-md-9">
                <form class="table-bordered border-primary" action="#" method="post">
                    <h4 class="card-header text-center text-white">Permisos Habilitados</h4>
                    <table class="table text-center text-white">
                        <thead>
                            <tr>
                                <th scope="col">Tipo</th>
                                <th scope="col">Visibilidad</th>
                                <th scope="col">></th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button class="btn btn-success" name="" value="" type="submit">></button></td>
                            </tr>
                        </tbody>

                    </table>
                </form>

            </div>
        </div>
    </div>
</body>