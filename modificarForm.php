<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
          <form class="" action='consultas/modificar.php?id=<?php  echo $_GET['id']; ?>' method='post' enctype="multipart/form-data">
            <div class='contenedor-items'>
              <label for="">Titulo de rese&ntilde;a: </label><br>
              <input type='text' name="titulo" value="<?php  echo $_GET['titulo']; ?>""><br>
              <label for="">Rese&ntilde;a: </label><br>
              <textarea name="resenia" rows="8" class="resenia" cols="80"><?php  echo $_GET['resenia']; ?></textarea><br><br>
            </div>
            <input type="submit" name="" class="btn-submit" value="Modificar">
          </form>
  </body>
</html>
