<?php
// Clases del proyecto.
    //clase usuario.
    class Usuario{
        //propiedades privadas
        private $nombre;
        private $correo;
        private $user;
        private $pass;

        //constructor
        public function __construct($nombre,$correo,$user,$pass){
            $this->nombre=$nombre;
            $this->correo=$correo;
            $this->user=$user;
            $this->pass=$pass;
        }

        //métodos de acceso a las variables privadas
        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setCorreo($correo){
            $this->correo=$correo;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function setUser($user){
            $this->user=$user;
        }
        public function getUser(){
            return $this->user;
        }
        public function setPass($pass){
            $this->pass=$pass;
        }
        public function getPass(){
            return $this->pass;
        }
    }
    //clase para el funcionamiento de la aplicacion
    class Registro{
        public $usuarios= array();

        public function __construct(){

            $this->leerArchivo();
        }

        public function agregar($usuario){
            $fila=array($usuario->getNombre(),$usuario->getCorreo(),$usuario->getUser(),sha1($usuario->getPass()));
            array_push($this->usuarios,$fila);
            $this->almacenarBD();
        }
        
        public function buscar($user,$pass){
            $msg="Usuario no encontrado!!";
            foreach($this->usuarios as $fila){
                if(($fila[2]==$user) and ($fila[3]===sha1($pass))){
                    $msg="Bienvenido $fila[0]!!";
                break;
                }
            }
            return $msg;
        }

        public function leerArchivo(){
            $filas=array();
            $path = "BDUsuarios.txt";
            $file = fopen($path, "r");
            if (!file_exists($path))
                exit("File not found");
            $rows = file($path);
            foreach($rows as $row){
                $datos=explode("|",$row);//converimos la fila en un arreglo separado por |
                array_push($filas,$datos); //guardamos todas las filas
            }
            $this->usuarios=$filas;
        }
        public function almacenarBD(){
            $path = "BDUsuarios.txt";
            if (!file_exists($path))
                exit("File not found");
            $file = fopen($path, "w");
            fseek($file,0);
            foreach($this->usuarios as $linea){
                fwrite($file,"$linea[0]|$linea[1]|$linea[2]|$linea[3]");
            }
            fclose($file);
        }
    }

    // funcionamiento de los formularios
    $mensaje="";
    $almacen=new Registro();
    if(isset($_POST['guardar'])){
        $user=new Usuario($_POST['nombre'],$_POST['correo'],$_POST['user'],$_POST['pass']);
        $almacen->agregar($user);
        echo "<script>alert('Usuario ".$_POST['user']." almacenado')</script>";
    }elseif(isset($_POST['registrar'])){
        header('location: registro.php');
    }elseif(isset($_POST['entrar'])){
        $mensaje=$almacen->buscar($_POST['user'],$_POST['pass']);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desarrollo Web Avanzado</title>
    <!--- Estilos para centrar el contedor del formulario-->
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
        <div><?php echo $mensaje; ?></div>
    </div>
  
</body>
</html>