<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Movies' cave</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/inde.css">
    <link rel="stylesheet" href="css/res.css">
</head>
  <body>
    <?php include_once 'menu.php'; ?>
      <div class="reciente">
        <?php
          include_once 'consultas/conexion.php';

          if(!$conexion){
            die('error connecting to database');
          } else{
            $res = $conexion->query("SELECT * FROM posts");
            //Ciclo que imprime tas reseñas en la tabla
            while($datos=$res->fetch_array(MYSQLI_BOTH))
            {
              $res1 = $conexion->query("SELECT * FROM banners WHERE id_post = ".$datos['id']);
              $datos1=$res1->fetch_array();
              echo('
              <div class="pelicula">
                <img src="'.$datos1['foto'].'" class="imgPeli" alt="">
                <h4> <a href="resenia.php?id='.$datos['id'].'">'.$datos['titulo'].'</a> </h4>
              </div>
              ');

            }
          }
         ?>
      </div>

    </div>
  </body>
</html>
