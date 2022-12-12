
<?php

$conexion_mysql = mysqli_connect('localhost', 'root', 'root', 'ifpdb',3306);

if ($conexion_mysql->connect_errno) {
    printf("Error de conexión a la base de datos: %s\n", $conexion_mysql->connect_error);
    exit();
}

function ejecutarConsulta($consulta)
{
    global $conexion_mysql;

    $resultado = mysqli_query($conexion_mysql, $consulta);

    if(!$resultado)
    {
        printf("Error: %s\n", $conexion_mysql->error);
    }

    return $resultado;
}


?>