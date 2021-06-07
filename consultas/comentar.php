<?php
include_once 'conexion.php';

$contenido = $_POST['comment'];

if(!$conexion){
  die('error connecting to database');
} else{

    $query="INSERT INTO `comentarios` (`id`, `contenido`, `autor`, `id_post`, `fecha`) VALUES (NULL, '$contenido', '1', '".$_GET['id']."', CURRENT_TIMESTAMP)";
    $conexion->query($query);
    header("location: ../resenia.php?id=".$_GET['id']);
  }
 ?>
