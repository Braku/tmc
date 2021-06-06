<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

      $titulo = $_POST['titulo'];
      $resenia = $_POST['resenia'];

      $nom = $_REQUEST['titulo'];
      $banner = $_FILES['foto']['name'];
      $ruta = $_FILES['foto']['tmp_name'];
      $destino = "banners/".$banner;
      copy($ruta, $destino);

      include_once 'conexion.php';
      if(!$conexion){
        die('error connecting to database');
      } else{
        $query="INSERT INTO tmcdatabase.posts(titulo, resenia) VALUES('$titulo', '$resenia') ";
        $conexion->query($query);

        $res = $conexion->query("SELECT * FROM posts WHERE resenia = '$resenia'");
        $filas = $res->fetch_array();
        if($filas>0) {
          $res1 = $conexion->query("SELECT * FROM posts WHERE titulo = '$titulo'");
          $datos = $res1->fetch_array();
          $query1="INSERT INTO banners(foto, id_post, nombre) VALUES('$destino', '".$datos['id']."', '$nom')";
          $conexion->query($query1);

          echo ("<script type='text/javascript'>
          alert('Reseña publicada.');
          </script>");
          header("location: verResenia.php");
        } else {
          echo'<script type="text/javascript">
          alert("La reseña no se ha podido publicar.");
          </script>';
        }

      }
     ?>

  </body>
</html>
