<?php 

require 'db.php';

function comprobarLogin()
{
    if(!isset($_SESSION["usuario"]) &&
        isset($_COOKIE["cookie_usuario"]))
    {
        $_SESSION["usuario"] = recuperarUsuario($_COOKIE["cookie_usuario"]);
    }

    if(!isset($_SESSION["usuario"]))
    {
        header("Location: login.php");
        exit();
    }
}

function obtenerUsuario($usuario, $contraseña)
{
    $consulta  = "SELECT Id, Nombre, Correo FROM usuarios 
                  WHERE Id = '$usuario' AND Contraseña = '$contraseña'";

    $resultado = ejecutarConsulta($consulta);

    if($resultado)
    {
        $usuario_db = mysqli_fetch_assoc($resultado);
        return $usuario_db;
    }
}

function recuperarUsuario($usuario)
{
    $consulta  = "SELECT Id, Nombre, Correo FROM usuarios 
                  WHERE Id = '$usuario'";

    $resultado = ejecutarConsulta($consulta);

    if($resultado)
    {
        $usuario_db = mysqli_fetch_assoc($resultado);
        return $usuario_db;
    }
}

function hacerLogin($usuario)
{
    $_SESSION["usuario"] = $usuario;
    setcookie('cookie_usuario', $usuario["Id"], time() + 3600, '/');

    header("Location: index.php");
    exit();
}

function registrarUsuario($nombre, $correo, $usuario, $contraseña)
{
    global $conexion_mysql;

    $consulta  = "INSERT INTO usuarios (Nombre, Correo, Id, Contraseña)  
    VALUES (?, ?, ?, ?)";

    $stmt = $conexion_mysql->prepare($consulta);
    $stmt->bind_param('ssss', $nombre, $correo, $usuario, $contraseña); 
    $resultado = $stmt->execute();

    if($resultado)
    {
        return obtenerUsuario($usuario, $contraseña);
    }
}

?>