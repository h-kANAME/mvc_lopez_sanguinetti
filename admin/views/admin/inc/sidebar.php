<?php

//var_dump($_SESSION['permisos']);

?>

<div class="col mb-3 text-white">
    <div class="table-bordered border-primary">
        <div class="card-header">
            <h5 class="text-center">Permisos</h5>
        </div>
        <ul class="list-group">
            <a class="link" href="<?php // if ($_SESSION['permisos'] == 'fullAdmin') : constant('URL')?>adminUsuarios">
                <li class="list-group-item text-white bg-secondary">ADMIN  Usuarios</li>
            </a>
            <a class="link" href="<?php // if ($_SESSION['permisos'] == 'fullAdmin') : constant('URL')?>adminProductos">
                <li class="list-group-item text-white bg-secondary">ADMIN  Productos</li>
            </a>
            <a class="link" href="<?php // if ($_SESSION['permisos'] == 'fullAdmin') : constant('URL')?>gestionComentarios">
                <li class="list-group-item text-white bg-secondary">ADMIN - Comentarios</li>
            </a>
            <a class="link" href="#">
                <li class="list-group-item text-white bg-secondary">ADMIN  Marcas</li>
            </a>
            <a class="link" href="#">
                <li class="list-group-item text-white bg-secondary">ADMIN  Categorias</li>
            </a> <a class="link" href="#">
                <li class="list-group-item text-white bg-secondary">ADMIN  Sub Categorias</li>
            </a>
        </ul>
    </div>
</div>