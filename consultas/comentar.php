<?php
include_once 'conexion.php';

$contenido = $_POST['comment'];

if(!$conexion){
  die('error connecting to database');
} else{

    $query="INSERT INTO comentarios(contenido, autor, id_post) VALUES('$contenido', NULL, '".$_GET['id']."'  )";
    $conexion->query($query);
  }
 ?>
