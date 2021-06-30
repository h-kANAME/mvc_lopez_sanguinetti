<!DOCTYPE html>
<html lang="es">

<head>
  <title>Productos</title>
</head>

<body class="backdark">
  <?php require 'views/header.php';
  $PAGINA_LISTADO = 'productos';

  if (isset($_REQUEST['id_marca'])) {
    $id_marca = $_REQUEST['id_marca'];
  } else {
    $id_marca = '';
  }

  if (isset($_REQUEST['id_categoria'])) {
    $id_categoria = $_REQUEST['id_categoria'];
  } else {
    $id_categoria = '';
  }

  if (isset($_REQUEST['id_sub_categoria'])) {
    $id_sub_categoria = $_REQUEST['id_sub_categoria'];
  } else {
    $id_sub_categoria = '';
  }

  if (isset($_REQUEST['id_orden'])) {
    $id_orden = $_REQUEST['id_orden'];
  } else {
    $id_orden = '';
  }

  ?>

  <div class="container my-6">
    <div class="row">

      <div class="col-lg-5">
        <form action="">
          <div class="list-group lista-filtros" data-categoria=<?php echo '"' . $id_categoria . '"' ?> data-marca=<?php echo '"' . $id_marca . '"' ?>>

            <?php
            echo ' <h3 class="">  <a class="filtro-categorias"  data-id="marca"  href="' . $PAGINA_LISTADO . '?id_marca=&id_categoria=' . $id_categoria . '">Marcas</a> </h3>';           
            foreach ($this->marcas as $row) {
              $marca = new Marca();
              $marca = $row;
              echo '<a class="" href="' . $PAGINA_LISTADO . '?id_marca=' . $marca->id_marca . '&id_categoria=' . $id_categoria . '&id_orden=' . $id_orden . '">';
              echo ' <button data-id="' . $marca->nombre . '" type="button" data-filtro="marca"  class="list-group-item list-group-item-action marca ">
             ' . $marca->nombre . '
             </button>';
              echo '</a>';
            }
            echo '</div>';
            echo '</div>';
            echo  '<div class="col-lg-5 mx-auto">';
            echo ' <h3 class="mx-auto ">  <a class="filtro-categorias" data-id="categoria"  href="' . $PAGINA_LISTADO . '?id_marca=' . $id_marca . '&id_categoria=">Categorias</a> </h3>';
            foreach ($this->categorias as $row) {
              $categoria = new Categoria();
              $categoria = $row;
              echo '<a class="" href="' . $PAGINA_LISTADO . '?id_marca=' . $id_marca . '&id_categoria=' . $categoria->id_categoria .  '&id_orden=' . $id_orden . '">';
              echo ' <button type="button" data-id="' . $categoria->nombre . '" data-filtro="categoria"  class="list-group-item list-group-item-action  categoria ">
                ' . $categoria->nombre . '
              </button>';
              echo '</a>';
            }


            
            echo ' <h3 class="">  <a class="filtro-categorias"  data-id="sub_categoria"  href="' . $PAGINA_LISTADO . '?id_sub_categoria=&id_sub_categoria=' . $id_sub_categoria . '">Sub Categoria</a> </h3>';           
            foreach ($this->subCategorias as $row) {
              $subCategoria = new SubCategoria();
              $subCategoria = $row;
              echo '<a class="" href="' . $PAGINA_LISTADO . '?id_sub_categoria=' . $id_sub_categoria . '&id_sub_categoria=' . $subCategoria->id_sub_categoria . '&id_orden=' . $id_orden . '">';
              echo ' <button data-id="' . $subCategoria->nombre . '" type="button" data-filtro="sub_categoria"  class="list-group-item list-group-item-action sub_categoria ">
             ' . $subCategoria->nombre . '
             </button>';
              echo '</a>';
            }


            ?>
          </div>
        </form>

        <div class="mt-5">
          <?php

          echo '<a href="' . $PAGINA_LISTADO . '?id_marca=' . $id_marca . '&id_categoria=' . $id_categoria .  '&ordenBy=asc' . '"><img src="public/img/Logos_Banners/orderAZ.jpg" alt="rowOrder" width="50" height="50"></a>';
          echo '<span style="margin-left: 10px;"></span>';
          echo '<a href="' . $PAGINA_LISTADO . '?id_marca=' . $id_marca . '&id_categoria=' . $id_categoria .  '&ordenBy=desc' . '"><img src="public/img/Logos_Banners/orderZA.jpg" alt="rowOrder" width="50" height="50"></a>';
          ?>
        </div>

      </div>
      <div class="container">
        <div class="row">

          <?php
          include_once "models/ProductosModelo.php";



          foreach ($this->productos as $row) {

            $producto = new Productos();
            $producto = $row;
            if (($producto->id_marca == $id_marca || $id_marca == '')
              && ($producto->id_categoria == $id_categoria || $id_categoria == '')
            ) {

              
              if ($producto->rank > 0) {
                $rank = '';
            }
            if ($producto->rank > 0) {
                $rank = '★';
            } if ($producto->rank > 1) {
                $rank = '★★';
            } if ($producto->rank > 2) {
                $rank = '★★★';
            } if ($producto->rank > 3) {
                $rank = '★★★★';
            } if ($producto->rank > 4) {
                $rank = '★★★★★';
            }

               

              echo '<div class="col-md-4 card-body">';
              echo '<div class="card" style="width: 20rem;">';
              echo '<div class="card text-center">';

              echo '<img src="' . $producto->imagen . '" class="card-img-top img-fluid"  alt="' . $producto->modelo . '">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title">' . $producto->modelo . '</h5>';

              echo '<h6 class="card-text">' . '$' . $producto->precio . '</h6>';

              echo '<h6 class="card-text">' . 'Valoracion: ' . $rank . '</h6>';

              echo '</div>'; //Cry

              echo '<div class="btn-group">';
              echo '<a href="producto_modelo?id_producto=' . $producto->id_producto . '" class="btn btn-dark">Detalles</a>';

              echo '</div>'; // Card body
              echo '</div>'; // Style width 20

              echo '</div>';
              echo '</div>';
              
            } 
             
          
        }
           
          ?>

        </div>
      </div>
</body>
</div>

<?php require 'views/footer.php'; ?>