<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Movies' Cave</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>

  </head>
  <body>
    <div class="contenedor">
      <button type="button" name="button">Regresar</button>
      <center>
      <form class="registro" method="post" action="registro.php">
        <h3>Registro</h3>
        <label for="">Nombre:</label><br>
        <input type="text" name="name" value="" class="input"> <br><br>
        <label for="">Apellido:</label><br>
        <input type="text" name="lname" value="" class="input"> <br><br>
        <label for="">Correo:</label><br>
        <input type="email" name="mail" value="" class="input"> <br><br>
        <label for="">Contraseña (Maximo 16 caracteres):</label><br>
        <input type="password" maxlength="16" name="pword" value="" class="input"> <br><br>
        <label for="">Confirma tu contraseña:</label><br>
        <input type="password" maxlength="16" name="confirpw" value="" class="input"> <br><br>
        <input type="submit" name="" value="Registrarse" class="submit">
      </form>
    </center>
    </div>
  </body>
</html>
