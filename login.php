
<?php 

    session_start();

    require "controladores/controladorUsuarios.php"; 

  

    if(isset($_POST["hacerLogin"]))
    {
        $usuario = obtenerUsuario($_POST["nombre"], $_POST["password"]);

        if($usuario)
        {
            hacerLogin($usuario);
        }
        else
        {
            $error = "El usuario o la contraseña no son válidos";
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
            <div class="border-3 border-info" style="padding:50px 40px 0px 40px;"> 
                <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group row">
                        <label for="inputUsuario" class="col-sm-4 col-form-label">Usuario</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputUsuario" name="nombre" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Contraseña</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputPassword" name="password" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-4 col-sm-8" style="padding-top: 15px;">
                            <input type="submit" value="Entrar" name="hacerLogin" class="btn btn-primary col-sm-4"/>
                            <a href="registrar.php" style="padding-left: 10px;" >Registrarse</a>
                        </div>
                    </div>
                </form>`
                <?php 
                
                    if(isset($error))
                        echo $error;
                ?>
            </div>
        </div>
	</body>
</html>