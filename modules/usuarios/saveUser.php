<?php
	//Llamadas de Conexion
	@include ("../../config/conexion.php");
	
	//Variables que recibe
	$nombre = strtoupper(trim($_POST['name']));
	$email = strtoupper(trim($_POST['email']));
	$pass = $_POST['password'];
	$hoy = date("Y-m-d H:i:s");

	$query = "SELECT id FROM usuarios WHERE correo ='".$email."'";
	$contenido = mysqli_query($conexion,$query);
	$data = @mysqli_fetch_assoc($contenido);

	if(empty($data['id'])){
		$consulta = "INSERT INTO usuarios (nombre,correo,contraseña,fecha_creación) 
		VALUES ('".$nombre."','".$email."',".$pass.",'".$hoy."')";	
	}else{
		echo "<script>alert('El email ingresado ya existe')</script>";
	}
		
	$resultado = mysqli_query($conexion,$consulta);

	if($resultado){
		echo "<script>alert('El usuarios fue creado Exitosamente')</script>";
	}else{
		echo $resultado;
	}
		 
	@mysqli_close($conexion);
	echo '<script type= "text/javascript"> window.location = "../rutas/NewRuta.php"; </script>';
?>
