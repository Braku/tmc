<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Movies' cave</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
  </head>
  <body>
    <?php include_once 'menu.php'; ?>
    <table title="Reseñas" class="tablaRes">
      <thead>
        <tr>
          <th colspan="2" align="center">Rese&ntilde;as</th>
          <td class="btnAdd"> <button type="button" name="button" onclick="" id='btn-abrir-popup' class='btn-abrir-popup'>  <strong>A&ntilde;adir</strong> </button> </td>
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
            <tr class='row'>
            <td width='82%'> <a href='' class='btnTitulo' id='btn-abrir-popup1'>".$datos['titulo']."</a> </td>
            <td width='15%'> <a href='?'>".$numComments." comentarios </a> </td>
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
</html>
