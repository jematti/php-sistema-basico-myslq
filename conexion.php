<?php
// Ejemplo de conexión a base de datos MySQL con PHP.
	//
	// Ejemplo realizado por Oscar Abad Folgueira: http://www.oscarabadfolgueira.com y https://www.dinapyme.com
	
	// Datos de la base de datos

	$user = 'root';
	$db = 'capacitacion';
	$host = '10.0.40.118';
	$password = "";


	// Selección del a base de datos a utilizar
	

	
	// establecer y realizar consulta. guardamos en variable.    
    
	$conexion =mysqli_connect($host,$user,$password,$db) or die ("No se ha podido conectar al servidor de Base de datos");


	
	// creación de la conexión a la base de datos con mysql_connect()
	
?>