<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Movies' cave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </head>
  <body>
        <?php include_once 'menu.php'; ?>
    <div class="container">
      <?php
      include_once 'consultas/conexion.php';

      if(!$conexion){
        die('error connecting to database');
      } else{
        $res = $conexion->query("SELECT * FROM posts WHERE id = ".$_GET['id']);
        $datos = $res->fetch_array();
        $res1 = $conexion->query("SELECT * FROM banners WHERE id_post = ".$_GET['id']);
        $datos1 = $res1->fetch_array();
        echo ('
        <div class="clearfix">
          <img src="'.$datos1['foto'].'" class="col-md-3 float-md-end mb-3 ms-md-3" alt="">
          <h3 class="card-title">'.$datos['titulo'].'</h3>
          <p>'.$datos['resenia'].'</p>
        </div>
        ');
      }

      echo ('
      </div>

      <div class="container">
        <form class="" action="consultas/comentar.php?id='.$_GET['id'].'" method="post">
          <textarea name="comment" rows="3" cols="80" class="comentario">Comentar...</textarea>
          <input type="submit" name="" value="Comentar" class="btn btn-primary">
        </form>
      ');
      ?>
      <table class="container">

        <?php
        $res = $conexion->query("SELECT * FROM comentarios WHERE id_post = ".$_GET['id']);


        //Ciclo que imprime tas reseñas en la tabla
        while($datos=$res->fetch_array(MYSQLI_BOTH))
        {

          $resNum = $conexion->query("SELECT * FROM comentarios WHERE id_post = ".$_GET['id']);
          // Cuenta el numero de comentarios de cada reseña
          $numComments = mysqli_num_rows($resNum);
          echo("
          <tr class='row'>
            <td width='100%'>
              <p>".$datos['contenido']."</p>
              <p>".$datos['fecha']."</p>
            </td>
          </tr>
          ");
        }
         ?>
      </table>
    </div>

  </body>
</html>
