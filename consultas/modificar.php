<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $title = $_POST['titulo'];
    $resenia = $_POST['resenia'];
    $conexion=mysqli_connect("localhost","root","","tmcdatabase");
          $consultaSQL="UPDATE posts SET titulo = '$title', resenia = '$resenia' WHERE id = ".$_GET['id'];
          mysqli_query($conexion,$consultaSQL);
          $query = "SELECT * FROM posts WHERE id = ".$_GET['id'];

          $resultado = mysqli_query($conexion, $query);
          $filas = mysqli_affected_rows($conexion);

          if($filas>0) {
            $data = mysqli_fetch_array($resultado);
            echo'<script type="text/javascript">
              alert("Reseña editada");
            </script>';
            header("location: ../verResenia.php");
          } else {
            echo'<script type="text/javascript">
              alert("Edicion incompleta");
            </script>';
          }
     ?>
  </body>
</html>
