<!DOCTYPE html>
<html lang="es">

<head>
  <title>Productos</title>
</head>

<body class="backdark">
  <?php require 'views/header.php'; ?>

  <div class="container my-5">
    <div class="row">
      <div class="col">

        <a href="productos?tipo=asc"><img src="public/img/Logos_Banners/orderAZ.jpg" alt="rowOrder" width="50" height="50"></a>
        <span style="margin-left: 10px;"></span>
        <a href="productos?tipo=desc"><img src="public/img/Logos_Banners/orderZA.jpg" alt="rowOrder" width="50" height="50"></a>

      </div>
    </div>
  </div>

  <div class="container">
	<div class="row">
		<div class="col md-12 my-4 ">
			<?php
        foreach ($this->categorias as $row) {
          $categoria = new Categoria();
          $categoria = $row;
  
          if ($categoria) {
            echo '<div class="list-group">';   
            echo '<a href="#" class="list-group-item list-group-item-action list-group-item-light">' . $categoria->nombre . '</a>';
            echo '</div>';
          }
        }
			?>
		</div>

    <div class="col md-12 my-4 ">
			<?php
        foreach ($this->marcas as $row) {
          $marca = new Marca();
          $marca = $row;
  
          if ($marca) {
            echo '<div class="list-group">';   
            echo '<a href="#" class="list-group-item list-group-item-action list-group-item-light">' . $marca->nombre . '</a>';
            echo '</div>';
          }
        }
			?>
		</div>  

	</div>
</div>


  <div class="container">
    <div class="row">

      <?php
      
   

      include_once "models/ProductosModelo.php";
      foreach ($this->productos as $row) {
        $producto = new Productos();
        $producto = $row;

        if ($producto) {
    
          echo '<div class="col-md-4 card-body">';
          echo '<div class="card" style="width: 20rem;">';
          echo '<div class="card text-center">';

          echo '<img src="' . $producto->imagen . '" class="card-img-top img-fluid"  alt="' . $producto->modelo . '">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . $producto->modelo . '</h5>';

          echo '<h6 class="card-text">' . '$' . $producto->precio . '</h6>';
          echo '</div>'; //Cry

          echo '<div class="btn-group">';
          echo '<a href="producto_modelo.php?id_producto=' . $producto->id_producto . '" class="btn btn-dark">Detalles</a>';

          echo '</div>'; // Card body
          echo '</div>'; // Style width 20

          echo '</div>';
          echo '</div>';
        }
      }
      ?>


    </div>
  </div>



  <?php require 'views/footer.php'; ?>

</body>


<?php

echo '<div class="col-md-4 card-body">';
echo '<div class="card" style="width: 17rem;">';
echo '<div class="card text-center">';

echo '<img src="' . $producto->imagen . '" class="card-img-top"  alt="' .  $producto->modelo . '">';
echo '<div class="card-body">';
echo '<h5 class="card-title">' .  $producto->modelo . '</h5>';

echo '<h6 class="card-text">' . '$' . $producto->precio . '</h6>';
echo '</div>'; //Cry

echo '<div class="btn-group">';
echo '<a href="producto_modelo.php?id_producto=' . $producto->id_producto . '" class="btn btn-dark">Detalles</a>';

echo '</div>'; // Card body
echo '</div>'; // Style width 20

echo '</div>';
echo '</div>';
?>