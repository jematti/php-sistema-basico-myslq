<?php
include("conexion.php");


session_start();
if(!isset($_SESSION["id_administrador"])){ //Si no ha iniciado sesión redirecciona a index.php
	header("Location:index.php");
}
include('head.php');


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
				<form action="reporteinscritospdf.php" class="form-neon" autocomplete="off" method="get">
					
				
					<fieldset>
						<legend><i class="fa fa-book"></i> &nbsp; Reporte de Personas Inscritas</legend>
						<!-- <div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="ci" id="ci" maxlength="35" >
									</div>
								</div>
							</div>
						</div> -->
						<p class="text-center" style="margin-top: 40px;">
					      <i class='fa fa-download' style='font-size:40px;color:black'>
					      <button type="submit" class="btn btn-primary"><h4 class="text-dark">Generar Reporte</h4></button> 
                          </i>
                        </p>
                        
                        <div class="container-fluid">
							<p class="text-center" style="margin-top: 40px;">	 
								<a href="logout.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">
                                <i class='fa fa-times' style='font-size:20px;color:white'></i>    
                                Salir</a>
							</p>											
					    <div>	
		
					</fieldset>
					
				</form>
			</div>
			 <!-- Content -->



			 
		 
<!--  footer   -->
<?php
include('footer.php');
?>
	
</body>
</html>