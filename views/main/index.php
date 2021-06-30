<?php
require 'views/header.php';
?>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Inicio</title>
</head>

<body class="backdark">


  <div class="container">
    <div class="row">
      <div class="col">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner cardMainColor my-4">
            <div class="carousel-item active">
              <img src="public/img/Logos_Banners/hardware_slide.jpg" class="img-fluid" alt="...">
            </div>
            <div class="carousel-item">
              <img src="public/img/Logos_Banners/software_slide.jpg" class="img-fluid" alt="...">
            </div>
            <div class="carousel-item">
              <img src="public/img/Logos_Banners/perifericos_slide.jpg" class="img-fluid" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="card text-center my-5">
      <div class="btn btn-primary">
        <h5 class="mb-0">Productos destacados</h5>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="col-md-12 my-3">
      <div class="card-deck">

        <?php
        include_once "models/MainModelo.php";
        foreach ($this->destacados as $row) {
          $destacado = new Destacados();
          $destacado = $row;
          if ($destacado->destacado = 'destacado') {
        ?>
            <?php
            if ($destacado->rank > 0) {
              $rank = '';
            }
            if ($destacado->rank > 0) {
              $rank = '★';
            }
            if ($destacado->rank > 1) {
              $rank = '★★';
            }
            if ($destacado->rank > 2) {
              $rank = '★★★';
            }
            if ($destacado->rank > 3) {
              $rank = '★★★★';
            }
            if ($destacado->rank > 4) {
              $rank = '★★★★★';
            }
            ?>
            <div class="card">
              <img src="<?php echo $destacado->imagen ?>" class="card-img-top" alt="...">

              <div class="card-body">
                <h5 class="card-title"><?php echo $destacado->modelo ?></h5>
                <p class="card-text"><?php echo 'ARS ' . $destacado->precio ?></p>
                <?php
                echo '<h6 class="card-title">' . 'Valoracion: ' . $rank . '</h6>'
                ?>
              </div>
              <a href="producto_modelo?id_producto=<?php echo $destacado->id_producto ?>" class="btn btn-primary">Detalles</a>
            </div>

          <?php } ?>
        <?php } ?>
      </div>

    </div>
  </div>

</body>

<?php require 'views/footer.php'; ?>