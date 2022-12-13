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
$endpoint = 'http://'.$_SERVER['HTTP_HOST'] . "/UF4_API/index.php";
$json = json_encode($actividad);

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $endpoint);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


$output = curl_exec($curl);

curl_close($curl);

if($output)
       echo $output;
}

function listarActividades()
{
$endpoint = 'http://' .$_SERVER['HTTP_HOST'] . "/UF4_API/index.php";

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $endpoint);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($curl);

curl_close($curl);

$listado = json_decode($output, true);
$actividades = array();

foreach($listado as $fila)
{
        $actividad = new Actividad($fila["Titulo"], $fila["Tipo"], $fila["Fecha"], $fila["Ciudad"], $fila["Precio"], $fila["Usuario"]);
        array_push($actividades, $actividad);

}

return $actividades;

}
?>