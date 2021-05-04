<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $conexion=mysqli_connect("localhost","root","","tmc");
      $nombre = $_POST['name'];
      $apellido = $_POST['lname'];
      $email = $_POST['mail'];
      $contra = $_POST['pword'];



      $consultaSQL="INSERT INTO users(name, last_name, mail, passw)
        VALUES ('$nombre', '$apellido', '$email', '$contra')";
        mysqli_query($conexion,$consultaSQL);
        $query = "SELECT * FROM users WHERE mail = $email";
        $resultado = mysqli_query($conexion, $query);
        $filas = mysqli_num_rows($resultado);

        if($filas>0) {
          $data = mysqli_fetch_array($resultado);
          echo' <script type="text/javascript">
                  alert("Registro Completo");
                </script>';
        } else {
            echo' <script type="text/javascript">
                    alert("Registro incompleto");
                  </script>';
          }
     ?>
  </body>
</html>
