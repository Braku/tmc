<table border="1" title="Reseñas">
  <thead>
    <tr>
      <th colspan="2">Rese&ntilde;as</th>
      <td> <button type="button" name="button" onclick="" id='btn-abrir-popup' class='btn-abrir-popup'> A&ntilde;adir </button> </td>
    </tr>
  </thead>
  <tbody>
    <?php
    include_once 'conexion.php';

    if(!$conexion){
      die('error connecting to database');
    } else{
      $res = $conexion->query("SELECT * FROM posts");


      //Ciclo que imprime tas reseñas en la tabla
      while($datos=$res->fetch_array(MYSQLI_BOTH))
      {
        echo("
        <tr>
        <td> <button>".$datos['titulo']."</button> </td>
        <td> <a href = 'resenia.php?id=".$datos['id']."'>".$datos['resenia']."</a> </td>
        </tr>
        ");
      }
    }
    ?>
  </tbody>
</table>
