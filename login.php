<?php

    include_once 'database.php';

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
            header('location: index.php');
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
            $rol = $row[3];

            $_SESSION['rol'] = $rol;
            switch($rol){
              case 1:
                  header('location: indexAdmin.php');
              break;

              case 2:
              header('location: index.php');
              break;

              default:
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Movies' cave</title>

    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <form action="#" method="POST">
        <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <a href="../" class='btnCerrar'> Regresar </a>
        <h2>Iniciar sesión</h2>
        <p>Nombre de usuario: <br>
        <input type="text" name="username"></p>
        <p>Password: <br>
        <input type="password" name="password"></p>
        <p><input type="submit" value="Iniciar Sesión"></p> <br><br>
        <p class="center">¿Aun no tienes una cuenta? - <a href="registro.php">Registrate</a></p>
    </form>
</body>
</html>
