<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Alumnos</title>
    </head>
    <body>
      <?php require 'views/header.php';?>
        <div class="center" id="main">
            <h1>Consulta</h1>
            <table width='100%'>
            <thead>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Correo</th>
              <th>Imagen</th>
            </thead>
            <tbody>
              <?php
               // include_once "models/Alumno.php";

                foreach ($this->alumnos as $row){
                 // $alumno = new Alumno();
                  $alumno = $row;

              ?>
                <tr>
                  <td><?=$alumno->nombre?></td>
                  <td><?=$alumno->apellido?></td>
                  <td><?=$alumno->correo?></td>
                  <td><?=$alumno->imagen?></td>
                  <td><a href="#"> Editar </a></td>
                  <td><a href="#"> Eliminar </a></td>
                </tr>

            <?php } ?>
            </tbody>
            
            
            
            </table>
        </div>
      <?php require 'views/footer.php';?>
    
    </body>





</html>