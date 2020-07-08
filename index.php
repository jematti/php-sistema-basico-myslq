<?php
include("conexion.php");


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
				<form action="registrar.php" class="form-neon" autocomplete="off" method="get">
					
				
					<fieldset>
						<legend><i class="fas fa-user-lock"></i> &nbsp; Ingresar CI (Nº de Carnet de Identidad)</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="ci" id="ci" maxlength="35" >
									</div>
								</div>
							</div>
						</div>
						<p class="text-center" style="margin-top: 40px;">
					      <i class='fas fa-address-card' style='font-size:40px;color:black'>
					      <button type="submit" class="btn btn-primary"><h4 class="text-dark">Ingresar</h4></button> 
						  </i>
						</p>
					</fieldset>
					
				</form>
			</div>
			 <!-- Content -->



			 
			<!-- Content -->
			<div class="container-fluid">
		     	<form  class="form-neon" autocomplete="off" method="get">
	
					<fieldset>
						<legend><i class="fas fa-id-card-alt"></i> &nbsp; Registrarse Empleados(EVENTUALES)</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-12">
									<div class="container-fluid">
									<p class="text-center" style="margin-top: 40px;">
									 <i class='fas fa-user-edit' style='font-size:40px;color:black'></i>
									<a href="registrar_eventual.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Registrarse</a>
									</p>											
								    <div>	
								</div>
							</div>
						</div>
						
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