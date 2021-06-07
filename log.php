<?php

    include_once 'database.php';

     session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        // destroy the session
        session_destroy();
    }

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: indexAdmin.php');
            break;

            case 2:
            header('location: indexvisita.php');
            break;

            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT *FROM usuarios WHERE usuario = :username AND contra = :password');
        $query->execute(['username' => $username, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);

        if($row == true){
            $rol = $row[4];

            $_SESSION['rol'] = $rol;
            switch($rol){
              case 1:
                  header('location: indexAdmin.php');
              break;

              case 2:
              header('location: indexvisita.php');
              break;

              default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }


    }

?>
