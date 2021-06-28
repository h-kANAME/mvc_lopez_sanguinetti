<?php

$PAGINA_LISTADO = 'producto_modelo';
require 'views/header.php';




$id_producto = $_REQUEST['id_producto'];

include_once "models/ProductosModelo.php";

foreach ($this->productos as $row) {

    $producto = new Productos();
    $producto = $row;
    if ($producto->id_producto == $id_producto)
       {
           $productoSi = $producto;
    }
}



?>





<div class="container">
	<div class="text-center">
		<div class="card body bg-dark col-8 mt-5 aline-center">
			<img src="<?php echo $producto['img'] ?>" class="card-img-top my-3" alt="...">

			<div class="card-body">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h5 class="card-title text-warning"><?php echo $producto['nombre'] ?></h5>
						</div>
						<div class="col-md-6">
							<p class="card-text text-warning lead">$<?php echo  $producto['precio'] ?></p>
						</div>
					</div>
				</div>
			</div>
			<div>
				<table class="table table-striped cardMainColor">
					<thead>
						<tr>
							
							<th scope="col">Descripcion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $producto['descripcion'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>



			<div class="row">
				<div class="col">
					<form name="form" method="POST" action="">
						<div class="form-group">
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Tu email" required>
							<br>
						</div>
						<textarea class="form-control" name="descripcion" rows="6" placeholder="Tu comentario..." required></textarea>
						<div class="form-group my-3">

							<div class="container">
								<div class="row">
									<div class="col-md-4">
										<select name="califaicacion">
											<option value="★">*</option>
											<option value="★★">**</option>
											<option value="★★★">***</option>
											<option value="★★★★">****</option>
											<option value="★★★★★">*****</option>
										</select>
									</div>
									<div class="col-md-4 mb-6">

										<input type="submit" name="comentar" class="btn btn-success" onclick="$aBase()">
									</div>
									<div class="col-md-4 mb-6">

										<a href='pdf.php?id_producto=<?php echo $producto['id_producto'] ?>'>
											<h4 class='btn btn-primary aline-center'>Descargar detalles</h4>
										</a>
									</div>


								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

		



<?php

$aBase = "INSERT INTO comentarios(fecha,id_producto,descripcion,calificacion,email) 
VALUES('05-05-2021 22:12:15','$id_producto', '$comentario','$califaicacion',$email')";

if (isset($_REQUEST['email']) && isset($_REQUEST['descripcion']) && isset($_REQUEST['califaicacion'])) {

  $email = $_REQUEST['email'];
  $comentario = $_REQUEST['descripcion'];
  $califaicacion = $_REQUEST['califaicacion'];

  date_default_timezone_set("America/Argentina/Buenos_Aires");
	$comentarios[date('YmdHisU')] = array("fecha" => date('d-m-Y H:i:s'),
	"id_producto" => $id_producto,
	"descripcion" => $comentario,
	"califaicacion" => $califaicacion,
  "email" => $email,);
  


}

				

?>		







			<?php

$query = "SELECT * FROM `comentarios`";
$resultado = $con->query($query);
while ($comentario = $resultado->fetch(PDO::FETCH_ASSOC)){
						if ($comentario["id_producto"] == $id_producto) {
							$producto = $productos;

							

					echo " <div class='card-body bg-secondary text-center mt-5'>
					
						<h4> Comentario de: " . $comentario["email"] . "</h4>
						<p class='my-3'></p>
						
						<h5>" . $comentario["descripcion"] . "</h5>
						<p class='my-3'></p>
						
						<p>" . $comentario["fecha"] . "</p>
						</div>";
					echo '<br>';

						

				}
			}
		

		?>
	</div>
</div>
</div>








</div>
</div>

<?php
include_once('inc/footer.php');
?>