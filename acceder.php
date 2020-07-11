<?php
include("conexion.php");
include('head.php');
//iniciar la sesion antes de comenzar
session_start();



//hacemos el recibo de datos mediante Post del formulario
if(!empty($_POST))
{
    //creamos las variable para hacer la consulta y recibimos los datos del formulario
    $usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
    $password = mysqli_real_escape_string($conexion,$_POST['passw']);
    $error = "error";
    
    //realizamos la consulta
    $sql = "SELECT usuario, password FROM administrador WHERE password = '$password' and usuario = '$usuario' ";
    $result=$conexion->query($sql);
    $rows = $result->num_rows;
    
    //verificamos si existe el usuario y contraseña
    if($rows > 0) {
        $row = $result->fetch_assoc();
        //creamos la variable de sesion 'id_administrador' y toma el valor de la constraseña    
        $_SESSION['id_administrador'] = $row['password'];
        //NOS DA ACCESO A LA PAGINA
        header("location: reporte.php");
		
    } else {
    $error = "El nombre o contrase&ntilde;a son incorrectos";
    }
}


?>
<!DOCTYPE html>
<html lang="es">
<body>
	<!-- Main container -->
<?php
include('menu.php');


?>
		
			<!-- Content -->
			<div class="container-fluid">
            <div class="container">
                <div class="login-content">
                    <p class="text-center">
                        <i class="fas fa-user-circle fa-5x"></i>
                    </p>
                    <p class="text-center">
                        Inicia sesión con tu cuenta
                    </p>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="on">
                        <div class="form-group">
                            <label for="UserName" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp; Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" pattern="{1,35}" maxlength="35">
                        </div>
                        <div class="form-group">
                            <label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; Contraseña</label>
                            <input type="password" class="form-control" id="passw" name="passw" maxlength="200">
                        </div>
                        <button class="btn btn-theme btn-block" name="login" type="submit"><i class="fa fa-lock" value="login"></i>Ingresar</button>
                        <!-- <a href="principal.php" class="btn-login text-center">LOG IN</a> -->
                    </form>
                </div>
            </div>

			</div>
			 <!-- Content -->



			 
		
			 
<!--  footer   -->
<?php
include('footer.php');
?>
	
</body>
</html>