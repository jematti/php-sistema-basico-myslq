<?php 
include("conexion.php");

$ci_usuario=$_REQUEST['ci_usuario'];


$verifica="SELECT * FROM `personal` WHERE ci=$ci_usuario and condicion=1";
$res=mysqli_query($conexion,$verifica);

$nroColumnas=mysqli_num_rows($res);

if($nroColumnas==1){
//Eventual Eliminar todo

$consulta="DELETE FROM `inscritos` WHERE ci='$ci_usuario'";

$consulta2="DELETE FROM `personal` WHERE ci='$ci_usuario'";

$sql_elimina=mysqli_query( $conexion, $consulta );

$sql_elimina2=mysqli_query( $conexion, $consulta2 );

header("location:reporte.php");
}else{
//Eliminar solo de la tabla de inscripciones
 $consulta="DELETE FROM `inscritos` WHERE ci='$ci_usuario'";
 $sql_elimina=mysqli_query( $conexion, $consulta );
 header("location:reporte.php");
}


?>