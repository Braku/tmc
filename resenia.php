<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>The Movies' cave</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/res.css">
  </head>
  <body>
        <?php include_once 'menu.php'; ?>
    <div class="content">
      <?php
      include_once 'consultas/conexion.php';

      if(!$conexion){
        die('error connecting to database');
      } else{
        $res = $conexion->query("SELECT * FROM posts WHERE id = ".$_GET['id']);
        $datos = $res->fetch_array();
        $res1 = $conexion->query("SELECT * FROM banners WHERE id_post = ".$_GET['id']);
        $datos1 = $res1->fetch_array();
        echo ("
        <img src='".$datos1['foto']."' class='poster' height='300px' alt=''>
          <h3 class='title'>".$datos['titulo']."</h3>
          <p class='title'>".$datos['resenia']."</p>
        ");
      }

      echo ('
      </div>

      <div class="comment">
        <form class="" action="consultas/comentar.php?id='.$_GET['id'].'" method="post">
          <textarea name="comment" rows="3" cols="80" class="comentario">Comentar...</textarea>
          <input type="submit" name="" value="Comentar" class="btnComment">
        </form>
      ');
      ?>
      <table>

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
