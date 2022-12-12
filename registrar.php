
<?php 

    session_start();

    require "controladores/controladorUsuarios.php"; 

  

    if(isset($_POST["registrar"]))
    {
        $usuario = registrarUsuario($_POST["nombre"], $_POST["correo"], $_POST["usuario"], $_POST["contraseña"]);

        if($usuario)
        {
            hacerLogin($usuario);
        }
    }
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Curso Programacion en Entorno Servidor</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos/login.css" >
    </head>
	<body>
        <div class="login">
            <h1>Registrarse</h1>
            <div class="border-3 border-info" style="padding:50px 40px 0px 40px;"> 
                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group row">
                        <label for="inputNombre" class="col-sm-4 col-form-label">Nombre</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputNombre" name="nombre" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputCorreo" class="col-sm-4 col-form-label">Correo</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputCorreo" name="correo" placeholder="Correo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUsuario" class="col-sm-4 col-form-label">Usuario</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputUsuario" name="usuario" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputContraseña" class="col-sm-4 col-form-label">Contraseña</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputContraseña" name="contraseña" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8" style="padding-top: 15px;">
                            <input type="submit" value="Registrar" name="registrar" class="btn btn-primary col-sm-8"/>
                        </div>
                    </div>
                </form>`
            </div>
        </div>
	</body>
</html>