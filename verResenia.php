<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Movies' cave</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </head>
  <body>

    <?php include_once 'menu.php'; ?>
    <div class="container">
      <table title="Reseñas" class="table table-striped">
        <thead>
          <tr>
            <th colspan="3" align="center">Rese&ntilde;as</th>
            <td class="btnAdd"> <button type="button" name="button" onclick="" id='btn-abrir-popup' class='btn btn-primary btn-abrir-popup'>  <strong>A&ntilde;adir</strong> </button> </td>
          </tr>
        </thead>
        <tbody>
          <?php
          include_once 'consultas/conexion.php';

          if(!$conexion){
            die('error connecting to database');
          } else{
            $res = $conexion->query("SELECT * FROM posts");


            //Ciclo que imprime tas reseñas en la tabla
            while($datos=$res->fetch_array(MYSQLI_BOTH))
            {

              $resNum = $conexion->query("SELECT * FROM comentarios WHERE id_post = ".$datos['id']);
              // Cuenta el numero de comentarios de cada reseña
              $numComments = mysqli_num_rows($resNum);
              echo("
              <tr>
              <td width='82%'> <a href='resenia.php?id= ".$datos['id']."' class='btnTitulo' id='btn-abrir-popup1'>".$datos['titulo']."</a> </td>
              <td width='15%'> <p>".$numComments." comentarios </p> </td>
              <td width='5%'> <a href = 'modificarForm.php?id=".$datos['id']."&titulo=".$datos['titulo']."&resenia=".$datos['resenia']."'>Modificar</a> </td>
              <td width='5%'> <a href = 'consultas/eliminar.php?id=".$datos['id']."'>Eliminar</a> </td>
              </tr>
              ");
            }

            // Cuenta las filas para saber ssi estan vacias
            $res1 = $conexion->query("SELECT * FROM posts");
            $filas = $res1->fetch_array();

            if($filas>0);
            else {
              echo ("
              <tr>
              <td colspan='3' width='400%' align='center' class='celda'> No hay reseñas agregadas </td>
              </tr>
              ");

            }
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Contenedor para los POP-UPS -->
    <div class='contenedor'>
      <div class='overlay' id='overlay'>
        <!-- POPUP PARA AGREGAR UNA RESEÑA -->
        <div class='popup popup_resenia' id='popup'>
          <a href="#" id='btnCerrar_popup' class='cerrar'> Cerrar </a>
          <h4 class='agregar'>A&ntilde;adir</h4>
          <form class="" action='consultas/agregar.php' method='post' enctype="multipart/form-data">
            <div class='contenedor-items'>
              <label for="">Titulo de rese&ntilde;a: </label><br>
              <input type='text' name="titulo" value=''><br>
              <label for="">Rese&ntilde;a: </label><br>
              <textarea name="resenia" rows="8" class="resenia" cols="80"></textarea><br><br>
              <input type="file" id="foto" name="foto"><br><br>
            </div>
            <input type="submit" name="" class="btn-submit" value="Agregar">
          </form>
        </div>
      </div>

      <!-- POPUP PARA VER LOS COMENTARIOS DE CADA RESEÑA -->
      <!-- <div class="overlay_comment">
        <div class="popup_comment">
          <a href="#" id="btnCerrar_popup" class="btnCerrar_popup"> <i></i> </a>
          <h3>Comentarios de $titulo</h3>
        </div>
      </div>
    </div> -->
    <script src="main.js" charset="utf-8"></script>

  </body>
  <footer>
    <div class="footer">
      <h3>DERECHOS RESERVADOS</h3>
    </div>
  </footer>
</html>
