  <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];
    $mail = $_POST['mail'];

      include_once 'conexion.php';


      if(!$conexion){
        die('error connecting to database');
      } else{

        $res = $conexion->query("SELECT * FROM usuarios WHERE mail = '$mail'");
        $filas = $res->fetch_array();

        if($filas>0) {
          header("location: registro.php");
          echo'<script type="text/javascript">
          alert("Registro incompleto, el correo ya esta registrado.");
          </script>';
        } else {
          $query="INSERT INTO usuarios(usuario, contra, mail, rol) VALUES('$usuario', '$contra', '$mail', 2)";
          $conexion->query($query);
          header("location: index.php");
          echo'<script type="text/javascript">
          alert("Registro exitoso.");
          </script>';
        }
      }



     ?>
  </body>
</html>
