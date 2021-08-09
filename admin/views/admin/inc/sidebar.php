<?php
$permiso = $_SESSION['permisos'];
// var_dump($_SESSION['permisos']);
// $permisos = $_SESSION['permisos'];
?>

<div class="col mb-3 text-white">
    <div class="table-bordered border-primary">
        <div class="card-header">
            <h5 class="text-center">Permisos</h5>
        </div>
        <ul class="list-group">

            <a class="link" <?php if (isset($_SESSION['permisos']) && $_SESSION['permisos'] == 'fullAdmin' || $_SESSION['permisos'] == 'userAdd') { ?> href="<?php constant('URL') ?> adminUsuarios">
                <li class="list-group-item text-white bg-secondary">ADMIN Usuarios</li>
                <?php } else { echo ''; } ?></a>

                <a class="link" <?php if (isset($_SESSION['permisos']) && $_SESSION['permisos'] == 'fullAdmin' || $_SESSION['permisos'] == 'productEdit') { ?> href="<?php constant('URL') ?> adminProductos">
                <li class="list-group-item text-white bg-secondary">ADMIN Productos</li>
                <?php } else { echo ''; } ?></a>


                <a class="link" <?php if (isset($_SESSION['permisos']) && $_SESSION['permisos'] == 'fullAdmin' || $_SESSION['permisos'] == 'commentAccecs') { ?> href="<?php constant('URL') ?> gestionComentarios">
                <li class="list-group-item text-white bg-secondary">ADMIN Comentarios</li>
                <?php } else { echo ''; } ?></a>

                <a class="link" <?php if (isset($_SESSION['permisos']) && $_SESSION['permisos'] == 'fullAdmin' || $_SESSION['permisos'] == 'labelAcces') { ?> href="<?php constant('URL') ?> gestionRotulos">
                <li class="list-group-item text-white bg-secondary">ADMIN Rotulos</li>
                <?php } else { echo ''; } ?></a>
       
        </ul>
    </div>
</div>