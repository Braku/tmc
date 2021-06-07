<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Movies' cave</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/inde.css">
</head>
  <body>
    <h1>THE MOVIES' CAVE</h1>
    <div class="vista">
     <p> <a href="verResenia.php" class="btnSession">Administrar reseñas</a> / <a href="index.php?cerrar_sesion=1" class="btnSession">Cerrar sesion</a> </p>
   </div>
   <nav class="nav">
     <ul>
       <li> <a href="indexAdmin.php">INICIO</a> </li>
       <li class="cat">
         <a href="categoria.php">RESEÑAS
           <!-- <ul class="cats">
             <li> <a href="#"> ACCION </a> </li>
             <li> <a href="#"> COMEDIA </a> </li>
             <li> <a href="#"> ROMANCE </a> </li>
             <li> <a href="#"> TERROR </a> </li>
             <li> <a href="#"> SUSPENSO </a> </li>
           </ul> -->
         </a>
       </li>
     </ul>
   </nav>
    <div class="vista">
      <div class="intro">
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
      </div> <br> <br>
      <div class="reciente">
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
              <div class="pelicula">
                <img src="'.$datos1['foto'].'" class="imgPeli" alt="">
                <h4> <a href="resenia.php?id='.$datos['id'].'">'.$datos['titulo'].'</a> </h4>
                <p class="parrafo"> <a href="resenia.php?id='.$datos['id'].'">'.$datos['resenia'].'</a> </p>
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
