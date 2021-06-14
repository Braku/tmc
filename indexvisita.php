<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: indexAdmin.php');
        }
    }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Movies' cave</title>
    <link rel="stylesheet" href="css/inde.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
  <body>
    <h1>THE MOVIES' CAVE</h1>
    <div class="container">
     <p> <a href="index.php?cerrar_sesion=2" class="btnSession btn-primary">Cerrar sesion</a> </p>
     <?php include_once 'menu.php'; ?>
     <div class="row row-cols-1 row-cols-md-5 g-3">
       <!-- <div class="intro">
       <section>
       <h3 class="introduccion">Introduccion</h3>
       <p class="introduccion">En ests sociedad hay demasiadas opiniones distintas
       sobre diversos temas en especifico. Estos mismos temas hacen que
       diferentes grupos de personas tengan una opinion y otras personas otra. <br>
       Por ello el objetivo de este blog es difundir nuestra opinion sobre las peliculas,
       un tema ya conocido y demandado por todo el internet, ya que varias personas quieren
       ver la opinion de alguien sobre su peicula favorita. <br>
       Ya que con las peliculas todo el mundo se entrtiene es una de los temas que causa mas controvercia,
       por ello se tiene que tener mucho cuidado con lo que se escribe </p>
     </section>
     <aside class="">
     <h3 class="introduccion">Autores:</h3>
     <h4>Brambila Rojas Alonso Baruk</h4>
     <h4>Larios Arreola Armando</h4>
     <h4>Jimenes Pineda Ernesto Manuel</h4>
   </aside>
 </div> <br> <br> -->
 <?php
 include_once 'consultas/conexion.php';

 if(!$conexion){
   die('error connecting to database');
 } else{
   $res = $conexion->query("SELECT * FROM posts");
   //Ciclo que imprime tas reseñas en la tabla
   while($datos=$res->fetch_array(MYSQLI_BOTH))
   {
     $res1 = $conexion->query("SELECT * FROM banners WHERE id_post = ".$datos['id']);
     $datos1=$res1->fetch_array();
     echo('
    <div class="col">
      <div class="card text-center" style="width: 13rem;">
        <img src="'.$datos1['foto'].'" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">'.$datos['titulo'].'</h5>
          <p class="card-text parrafo"> '.$datos['resenia'].'</p>
          <a href="resenia.php?id='.$datos['id'].'" class="btn btn-primary">Ver mas</a>
        </div>
      </div>
    </div>
     ');
   }
 }
 ?>

</div>
    </div>
  </body>
  <footer>
    <div class="footer">
      <center><h3>Derechos reservados</h3></center>
    </div>
  </footer>
</html>
