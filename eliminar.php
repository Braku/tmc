<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    include_once 'conexion.php';

    if(!$conexion){
      die('error connecting to database');
    } else{
      for ($i=0; $i < 2 ; $i++) {
        // code...
        $query = "DELETE FROM posts WHERE id =".$_GET['id'];
        $conexion->query($query);
        $query1 = "DELETE FROM banners WHERE id_post =".$_GET['id'];
        $conexion->query($query1);
      }

      header("location:verResenia.php");
    }
    ?>
  </body>
</html>
