<?php
include("conexion.php");


include('head.php');
//obtener el valor del carnet de CI


//actualizar el usuario

if (isset($_POST["insertar"])) 
{
        //Datos para registro eventual
        $CI=$_POST['ci'];
        $nombre=$_POST['p_nombre'];


		// Hubieron resultados
		// Aqui ya puedo utilizar el mysqli_fetch_array() sin reparo
		
		$cel=$_POST['cel'];
		
		$cel_ref=$_POST['cel_ref'];

		$equipos='';
		if(!empty($_POST['equipos'])){
			// Ciclo para mostrar las casillas checked checkbox.
			foreach($_POST['equipos'] as $selected){
				$equipos.= $selected.' ';
			}
		}
		
		$formacion='';

		if(!empty($_POST['formacion'])){
			// Ciclo para mostrar las casillas checked checkbox.
			foreach($_POST['formacion'] as $selected){
				$formacion.= $selected.' ';
			}
		}
		$condicion_lab='';
		if(!empty($_POST['condicion_lab'])){
			// Ciclo para mostrar las casillas checked checkbox.
			foreach($_POST['condicion_lab'] as $selected){
				$condicion_lab.= $selected.' ';
			}
		}

        $correo_per=$_POST['correo_per'];
		$funciones_resumen=$_POST['funciones_resumen'];

		$equipos_laboral='';
		if(!empty($_POST['equipos_laboral'])){
			// Ciclo para mostrar las casillas checked checkbox.
			foreach($_POST['equipos_laboral'] as $selected){
				$equipos_laboral.= $selected.' ';
			}
		}

		$patologia_base=$_POST['patologia_base'];
		$activo_patologia=$_POST['activo_patologia'];
		
		


		
		
        $sql2="INSERT INTO `personal`(`ci`, `nom_ap`, `condicion`) VALUES ($CI,'$nombre',1)";
       


		if(mysqli_query($conexion,$sql2)){
			$sql="INSERT INTO inscritos(
                ci, cel, cel_ref, equipos, formacion, condicion_lab, correo_per, correo_umsalud, correo_umsa, funciones_resumen, equipos_laboral, patologia_base, activo, activo_patologia)		
             VALUES ('$CI', $cel, $cel_ref, '$equipos', '$formacion', '$condicion_lab', '$correo_per', null, null, '$funciones_resumen', '$equipos_laboral', '$patologia_base',1 ,'$activo_patologia')";
            if(mysqli_query($conexion,$sql)){
               
                header('Location: alerta.php');
            }else{
                echo "<script> alert('Usuario no existente o Ya inscrito!!!'); 	</script>";        
            }
		}else{
			echo "<script> alert('Usuario no existente o Ya inscrito!!!'); 	</script>";	
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
				<form action="" class="form-neon" autocomplete="off" method="post">
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<div class="form-group">
                                        <h5> <strong>CI (Solo el Numero):</strong> </h5>
										<input type="number" class="form-control" name="ci" id="ci" >
										<div class="valid-feedback">
        								
      									</div>
									</div>
								</div>
								
								<div class="col-12 col-md-6">
									<div class="form-group">
                                        <h5> <strong>Nombre Completo :</strong> </h5>
										<input type="text"  class="form-control" name="p_nombre" >
									</div>
								</div>
								<div class="col-12 col-md-4">
								
								
							</div>
						</div>
					</fieldset>
					<br><br><br>
					<fieldset>
						<legend><i class="fas fa-user-lock"></i> &nbsp; Datos Laborales</legend>
						<div class="container-fluid">
							<div class="row">
							    <div class="col-12 col-md-12">
									<div class="form-group">
									<h5> <strong>Telefono Celular :</strong> </h5>
										<input type="text" class="form-control" name="cel" id="cel"  maxlength="20" required="true">
									</div>
								</div>
								
								<div class="col-12 col-md-6">
								<h5> <strong>Equipos Disponibles en su casa :</strong> </h5>
											<div class="form-check">
											<input class="form-check-input" type="checkbox" name="equipos[]" value="Computadora" id="defaultCheck1">
											<label class="form-check-label" for="defaultCheck1">
												Computadora
											</label>
											</div>

											<div class="form-check">
											<input class="form-check-input" type="checkbox" name="equipos[]" value="Telefono Movil" id="defaultCheck2" checked>
											<label class="form-check-label" for="defaultCheck2">
												Telefono Movil
											</label>
											</div>
											
											<div class="form-check">
											<input class="form-check-input" type="checkbox" name="equipos[]" value="Tablet" id="defaultCheck3">
											<label class="form-check-label" for="defaultCheck3">
												Tablet
											</label>
											</div>
											
											<div class="form-check">
											Otro:<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,80}" class="form-control" name="equipos[]" >
											</label>
											</div>
								</div>

								<div class="col-12 col-md-6">
								<h5> <strong>Formación Academica:</strong> </h5>
											<div class="form-check">
											<input class="form-check-input" type="checkbox" name="formacion[]" value="Licenciatura" id="defaultCheck1">
											<label class="form-check-label" for="defaultCheck1">
												Licenciatura
											</label>
											</div>

											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Tecnico Superior" name="formacion[]" id="defaultCheck2">
											<label class="form-check-label" for="defaultCheck2">
												Tecnico Superior
											</label>
											</div>
											
											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Maestria" name="formacion[]" id="defaultCheck3">
											<label class="form-check-label" for="defaultCheck3">
												Maestria
											</label>
											</div>
											
											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Doctorado" name="formacion[]" id="defaultCheck4">
											<label class="form-check-label" for="defaultCheck4">
												Doctorado
											</label>
											</div>
											
											
											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Ninguna"  name="formacion[]" id="defaultCheck5" checked>
											<label class="form-check-label" for="defaultCheck5">
												Ninguna
											</label>
											</div>

											<div class="form-check">
											Otro:<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="formacion[]" >
											</label>
											</div>	
								</div>

								<div class="col-12 col-md-6">
								<h5> <strong>Condicion Laboral:</strong> </h5>

											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="De planta" name="condicion_lab[]" id="defaultCheck1" >
											<label class="form-check-label" for="defaultCheck1">
											  De Planta
											</label>
											</div>

											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Eventual" name="condicion_lab[]" id="defaultCheck2" checked>
											<label class="form-check-label" for="defaultCheck2">
												Eventual
											</label>
											</div>
											
											<div class="form-check">
											Otro:<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="condicion_lab[]" >
											</label>
											</div>	
								</div>

								<div class="col-12 col-md-6">
								<h5> <strong>Disponibilidad de Equipos en su fuente Laboral:</strong> </h5>
											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Computadora" name="equipos_laboral[]" id="defaultCheck1">
											<label class="form-check-label" for="defaultCheck1">
											  Computadora
											</label>
											</div>

											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="Telefono Movil" id="defaultCheck2" name="equipos_laboral[]" checked>
											<label class="form-check-label" for="defaultCheck2">
												Telefono Movil
											</label>
											</div>
											
											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="tablet" name="equipos_laboral[]" id="defaultCheck3">
											<label class="form-check-label" for="defaultCheck3">
												tablet
											</label>
											</div>
											

											<div class="form-check">
											Otro:<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="equipos_laboral[]" >
											</label>
											</div>
								</div>
								

								<div class="col-12 col-md-9">
									<div class="form-group">
									    <h5><strong>Correo Personal</strong> </h5>
										<input type="email" class="form-control" name="correo_per" value="@gmail.com" maxlength="200" >
									</div>
								</div>
								
								<div class="col-12 col-md-6">
									<div class="form-group">
    									<h5><strong>Resumen de Funciones</strong> </h5>
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="funciones_resumen" required="true"></textarea>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<div class="form-check">
									<h5> <strong>Tiene una Patologia de base </strong> </h5>
										
										<input class="form-check-input" type="radio" name="activo_patologia" id="exampleRadios1" value="Si" >
										<label class="form-check-label" for="exampleRadios1">
										     	SI
										</label>
										</div>
										<div class="form-check">
										<input class="form-check-input" type="radio" name="activo_patologia" id="exampleRadios2" value="No" checked>
										<label class="form-check-label" for="exampleRadios2">
											    NO
										</label>

										<div class="form-check">
										SI SU RESPUESTA FUE <strong> SI </strong>, MENCIONE LA PATOLOGÍA<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="patologia_base" >
										</label>
										</div>
								</div>

								
								
                              
								
								</div>


							</div>
						</div>
					</fieldset>

					<!-- Seccion datos Opcionales -->

					<fieldset>
						<legend><i class="fas fa-address-book"></i> &nbsp; DATOS OPCIONALES</legend>
						<div class="container-fluid">
							<div class="row">
								
								<div class="col-12 col-md-4">
									<div class="form-group">
									<h5><strong>Telefono de Referencia</strong></h5>
									<input type="text"  class="form-control" name="cel_ref" id="cel_ref"  maxlength="20" value=0>
									</div>
								</div>
							
							</div>
						</div>
					</fieldset>
					
					
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-success btn-sm" name="insertar" id="Confirmar Registgro"><i class="fas fa-sync-alt"></i> &nbsp; Inscribirse</button>
						<a href=index.php class="btn btn-raised btn-danger btn-sm" role="button">Cancelar</a>
					</p>
				</form>
			</div>
		</section>
	</main>
	
<!--  footer   -->
<?php
include('footer.php');
?>
	
</body>
</html>

