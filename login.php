

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
    <form action="log.php" method="POST">
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
