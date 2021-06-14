<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Movies' cave</title>
    <link rel="stylesheet" href="css/inde.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
  <body>
    <?php include_once 'menu.php'; ?>
    <div class="container">
      <div class="row">
        <h4>Todas las reseñas</h4>
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

              <div class="card text-black" style="width: 13rem;">
                  <a href="resenia.php?id='.$datos['id'].'" class=" card btn"><img src="'.$datos1['foto'].'" class="card-img" alt=""></a>
                  <div class="card-body">
                    <h5 class="card-title">'.$datos['titulo'].' </h5>
                  </div>
                </div>
              ');

            }
          }
         ?>
      </div>
    </div>
    </div>
  </body>
</html>
