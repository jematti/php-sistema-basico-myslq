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

			 <!-- buscar -->
			 <div class="container-fluid">
                <form class="form-neon" method="post" >
                    <div class="container-fluid">
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="inputSearch" class="bmd-label-floating">¿Qué CI estas buscando?</label>
									<input type="text" class="form-control" name="busqueda" id="inputSearch" maxlength="30">
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-center" style="margin-top: 40px;">
                                    <button type="submit" class="btn btn-raised btn-info" name="buscar" id="buscar"><i class="fas fa-search"></i> &nbsp; BUSCAR</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
			        
			 <div class="container-fluid">
                <form action="">
                    <input type="hidden" name="eliminar-busqueda" value="eliminar">
                    <div class="container-fluid">
                        <div class="row justify-content-md-center">
                            <div class="col-12 col-md-6">
                                <p class="text-center" style="font-size: 20px;">
                                    Resultados de la busqueda <strong>“Buscar”</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
			 <!-- fin buscar -->
				<!-- seccion de busqueda y eliminacion -->
				<div class="container-fluid">
					<div class="table-responsive">
						<table class="table table-dark table-sm">
							<thead>
								<tr class="text-center roboto-medium">
									<th>#</th>
									<th>CI</th>
									<th>Nombre</th>
									<th>Celular</th>
									<th>Correo Electronico</th>				
									<th>ELIMINAR</th>
								</tr>
							</thead>
							<tbody>
								<?php       

										if (isset($_POST["buscar"])) 
										{
											$ci_usuario=$_POST['busqueda'];
											$sql="SELECT DISTINCT x.ci, y.nom_ap, x.cel, x.correo_per FROM inscritos x, personal y WHERE x.ci LIKE '".$ci_usuario."' and y.ci LIKE '".$ci_usuario."' ";											
											$res = mysqli_query( $conexion, $sql )or die ( "Algo ha ido mal en la consulta a la base de datos");
											$i=0;
											while($fila = mysqli_fetch_array($res))
											{   
												$i++;
												echo' <tr class="text-center" >';
												echo '<td>'.$i.'</td>';
												echo '<td>'.$fila[0].'</td>';
												echo '<td>'.$fila[1].'</td>';
												echo '<td>'.$fila[2].'</td>';
												echo '<td>'.$fila[3].'</td>';
												echo '<td>
													<a href="borrareventual.php?ci_usuario='.$fila[0].'" class="btn btn-danger" >ELIMINAR</a>
													</td>
												</tr>';
											}
										}else{
											$sql = "SELECT x.ci, y.nom_ap, x.cel, x.correo_per FROM inscritos x, personal y WHERE x.ci=y.ci ORDER BY y.nom_ap";
												
											$res = mysqli_query( $conexion, $sql )or die ( "Algo ha ido mal en la consulta a la base de datos");
											$i=0;
											while($fila = mysqli_fetch_array($res))
											{   
												$i++;
												echo' <tr class="text-center" >';
												echo '<td>'.$i.'</td>';
												echo '<td>'.$fila[0].'</td>';
												echo '<td>'.$fila[1].'</td>';
												echo '<td>'.$fila[2].'</td>';
												echo '<td>'.$fila[3].'</td>';
												echo '<td>
														<a href="borrareventual.php?ci_usuario='.$fila[0].'" class="btn btn-danger" >ELIMINAR</a>
													  </td>
												</tr>';
											}
										}
										mysqli_close($conexion);
								?>     
								
								
								
							</tbody>
						</table>
					</div>
				</div>
			 <!-- fin de seccion-->

			 
		 
<!--  footer   -->
<?php
include('footer.php');
?>
	
</body>
</html>