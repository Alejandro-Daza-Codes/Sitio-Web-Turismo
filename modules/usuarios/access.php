<?php 
session_start();
// incluimos el archivo de conexion
@include ("../../config/conexion.php");

//Variables que recibe
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$query = "SELECT * FROM usuarios WHERE correo='".$email."'";
$contenido = mysqli_query($conexion,$query);
$data = @mysqli_fetch_assoc($contenido);

if(empty($data['correo'])){
	echo "<script>alert('Usuario No Registrado')</script>";
	echo '<script type= "text/javascript"> window.location = "login.html"; </script>';
}else{
	if($data['password']!=$password){
		echo "<script>alert('Password Inválido')</script>";
		echo '<script type= "text/javascript"> window.location = "login.html"; </script>';
	}else{
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['user_id'] = $data['id'];
		$host = $_SERVER['HTTP_HOST'];
		$link = "http://$host/turismoeterno/modules/rutas/newRuta.php"; 

		//redireccionamos 
		echo '<script type= "text/javascript"> window.location = "'.$link.'"; </script>';
	}
}
?>