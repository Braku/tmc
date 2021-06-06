<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="master.css">
    <title></title>
  </head>
  <body>
    <div class="contenedor-formulario">
      <h3>Inicia sesion</h3>
      <div class="wrap">
      <form action="" class="formulario" name="formulario_registro" method="get">
        <div>
          <div class="input-group">
            <input type="text" id="nombre" name="nombre">
            <label class="label" for="nombre">Nombre:</label>
          </div>
          <div class="input-group">
            <input type="email" id="correo" name="correo">
            <label class="label" for="correo">Correo:</label>
          </div>
          <div class="input-group">
            <input type="password" id="pass" name="pass">
            <label class="label" for="pass">Contraseña:</label>
          </div>
          <div class="input-group">
            <input type="password" id="pass2" name="pass2">
            <label class="label" for="pass2">Repetir Contraseña:</label>
          </div>
          <div class="input-group radio">
            <input type="radio" name="sexo" id="hombre" value="Hombre">
            <label for="hombre">Hombre</label>
            <input type="radio" name="sexo" id="mujer" value="Mujer">
            <label for="mujer">Mujer</label>
          </div>
          <div class="input-group checkbox">
            <input type="checkbox" name="terminos" id="terminos" value="true">
            <label for="terminos">Acepto los Terminos y Condiciones</label>
          </div>

          <input type="submit" id="btn-submit" value="Enviar">
        </div>
      </form>
    </div>
  </div>
    <p>¿Aun no tienes una cuenta? - <a href="registro.php">Registrate</a></p>
  </body>
</html>
