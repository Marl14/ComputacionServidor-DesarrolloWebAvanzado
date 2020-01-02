<?php


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desarrollo Web Avanzado</title>
    <style>
    .container{
        margin:0 auto;
        width:500px;
        height:300px;
        display: block;
        transform: translate(0%,50%);
    }
    .izquierda{
        float:right;
    }
    </style>
</head>
<body>
    <div class="container">
        <h2>INICIO DE SESIÓN</h2><br>
        <hr>
        <form method="post" action="index.php">
            <label for="user">Nombre de Usuario:</label>
            <input type="text" name="user" id="user"><br>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="pass"><br>
            <input type="submit" value="Entrar" name="entrar">
            <br>
            <br>
            <input type="submit" class="izquierda" value="Registrar" name="registrar">
        </form>
    </div>
  
</body>
</html>