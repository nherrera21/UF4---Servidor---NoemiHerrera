<?php 

require "modelo/actividad.php";

function comprobarActividad()
{
    if(isset($_POST["crearActividad"]) ||
             $_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $nuevaActividad = new Actividad($_POST["titulo"], 
                                $_POST["tipo"], 
                                $_POST["fecha"], 
                                $_POST["ciudad"], 
                                $_POST["precio"],
                                $_SESSION["usuario"]["Id"]);

        crearActividad($nuevaActividad);   
    } 
}

function crearActividad($actividad)
{
    global $conexion_mysql;

    $consulta  = "INSERT INTO actividades (Titulo, Ciudad, Fecha, Precio, Usuario, Tipo)  
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conexion_mysql->prepare($consulta);
    $stmt->bind_param('sssdss', 
    $actividad->titulo, 
    $actividad->ciudad, 
    $actividad->fecha,
    $actividad->precio,
    $actividad->usuario,
    $actividad->tipo); 
    
    $stmt->execute();
}

function listarActividades()
{
    global $conexion_mysql;

    $actividades = array();

    $consulta  = "SELECT * FROM actividades";

    $resultado = mysqli_query($conexion_mysql, $consulta);

    if($resultado)
    {
        while($fila = mysqli_fetch_assoc($resultado))
		{
            $actividad = new Actividad($fila["Titulo"], 
                                       $fila["Tipo"], 
                                       $fila["Fecha"], 
                                       $fila["Ciudad"], 
                                       $fila["Precio"], 
                                       $fila["Usuario"]);
                                       
            array_push($actividades, $actividad);
		}
    }
	
    return $actividades;
}


?>