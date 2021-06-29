<?php
include_once('inc/header.php');
?>
<title>Aministrador de Sitio</title>

<body class="backdark">

    <div class="container my-3">
        <div class="row">
            <div class="col text-center">
                
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
                                <th scope="col">Usuario</th>
                                <th scope="col">Visibilidad</th>
                                
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td><?php if (isset($_SESSION['usuario'])){echo $_SESSION['usuario'];} ?></td>
                                <td><?php echo  $_SESSION['permisos']; ?></td>
                               
                            </tr>
                        </tbody>

                    </table>
                </form>

            </div>
        </div>
    </div>
</body>