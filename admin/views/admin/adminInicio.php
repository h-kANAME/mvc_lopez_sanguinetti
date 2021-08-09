<?php
include_once('inc/header.php');
?>
<title>Aministrador de Sitio</title>

<body class="backdark">

    <div class="container my-5">
        <div class="row">
            <div class="col text-center">
            <div class="card">
                    <h4 class="card-header">Usuario conectado</h4>
                    <h5 class="card-text text-success"> <?php if (isset($_SESSION['usuario'])) {
                            echo $_SESSION['usuario'];
                        } ?></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
          

            <div class="col-md-12">

            <?php include 'inc/sidebar.php'; ?>



            </div>
        </div>
    </div>
</body>