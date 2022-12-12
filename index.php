<?php 
session_start();

require "controladores/controladorActividad.php"; 
require "controladores/controladorUsuarios.php"; 


comprobarLogin();

comprobarActividad();

?>

<html>
	<head>
		<title>Curso Programacion en Entorno Servidor</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos/principal.css" >
	</head>
	<body>
        <div class="cabecera">
            <div class="usuario">
                <?php echo $_SESSION["usuario"]["Nombre"] ?>
            </div>
            <div>
                <a href="logout.php">Log out</a>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center titulo">
                <h1>Actividades</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-6">
                    <?php 

                    $actividades = listarActividades();
                    
                    foreach($actividades as $actividad):?>
                         <div class="card col-10 border-info mb-3">
                            <?php if($actividad->tipo !== ""): ?>
                                <img class="card-img-top" src="./imagenes/<?php echo $actividad->tipo; ?>.jpg">
                            <?php endif?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo $actividad->titulo ?></li>
                                <li class="list-group-item"><?php echo $actividad->ciudad ?></li>
                                <li class="list-group-item"><?php echo $actividad->fecha ?></li>
                                <li class="list-group-item"><?php echo $actividad->precio ?></li>
                            </ul>
                        </div>
                        </br>
                    <?php endforeach?>
                </div>
                <div class="col-4 border-3 border-info justify-content-center">
                    <?php include "formulario.html" ?>
                </div>
            </div>
        </div>
	</body>
</html>

