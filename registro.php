<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de Registro</title>
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
    .inter{
        margin:5px 5px 20px;
    }
    </style>
</head>
<body>
    <div class="container">
        <h3>Registro de Usuario</h3>
        <hr>
        <form action="index.php" method="post">
            <label class="inter" for="nombre">Nombre:</label>
            <input class="inter" type="text" name="nombre" id="nombre"  required="required"><br>
            <label class="inter" for="correo">Correo:</label>
            <input class="inter" type="email" name="email" id="email" required="required"><br>
            <label class="inter" for="user">Nombre de Usuario:</label>
            <input class="inter" type="text" name="user" id="user" placeholder="Mayús,Minús y Núm; de 5-15" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{5,15}$" title="Se requiere una Mayúscula, una Minúscula y un Número; desde 5 hasta 15 caracteres." required="required"/><br>
            <label class="inter" for="pass">Contraseña</label>
            <input class="inter" type="password" name="pass" id="pass" required="required" placeholder="Mayús,Minús,Núm;desde 8" title="Se requiere una Mayúscula, una Minúscula y un Número; mínimo 8 caracteres en cualquier orden" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            <input class="inter" type="submit" value="Guardar" name="guardar">
        </form>
    </div>
</body>
</html>