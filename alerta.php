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
				<form action="index.php" class="form-neon" autocomplete="off" method="get">
					
				
					
						<legend><i class="far fa-bell"></i> &nbsp; Mensaje</legend>
						
						<p class="text-center" >
					      <i class='fa fa-check-square' style='font-size:30px;color:green'>
					         !Inscripción Realizada!
                          </i>
                        </p>
                        
                        <div class="container-fluid">
							<p class="text-center" style="margin-top: 40px;">	 
								<a href="index.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">
                                <i class='fa fa-times' style='font-size:20px;color:white'></i>    
                                Salir</a>
							</p>											
					    <div>	
		
					
				</form>
			</div>
			 <!-- Content -->

        
			 
		 
<!--  footer   -->
<?php
include('footer.php');
?>
	
</body>
</html>