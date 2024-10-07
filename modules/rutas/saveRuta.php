<?php
	session_start();
	//Llamadas de Conexion
	@include ("../../config/conexion.php");
	
	//Variables que recibe
	$nombre = strtoupper(trim($_POST['name_ruta']));
	$descripcion = strtoupper(trim($_POST['descripcion']));
	$precio = $_POST['precio'];
	$contacto = strtoupper(trim($_POST['contact']));
	$fecha_ini = $_POST['fecha_ini'];
	$fecha_fin = $_POST['fecha_fin'];
	$duracion = strtoupper(trim($_POST['duracion']));
	$p_encuentro = strtoupper(trim($_POST['p_encuentro']));

	//Subimos archivo al servidor
	error_reporting(E_ALL);
	ini_set( 'display_errors', '1' );
	if( isset($_FILES['img_mapa']) ) {
		$fileName = $_FILES['img_mapa']['name'];
		$fileType = $_FILES['img_mapa']['type'];
		$fileSize = $_FILES['img_mapa']['size'];
		$destino = "../../images/mapas/" . $fileName;
		$archivo = "images/mapas/" . $fileName;
		if (move_uploaded_file( $_FILES['img_mapa']['tmp_name'], $destino ) ) {
			$query = "SELECT nombre_ruta FROM rutas WHERE nombre_ruta ='".$nombre."'";
			$contenido = mysqli_query($conexion,$query);
			$data = @mysqli_fetch_assoc($contenido);

			if(empty($data['nombre_ruta'])){
				$consulta = "INSERT INTO rutas (nombre_ruta,descripcion,precio,fecha_ini,fecha_fin,img_mapa,contacto,p_encuentro,duracion,id_user) 
				VALUES ('".$nombre."','".$descripcion."',".$precio.",'".$fecha_ini."','".$fecha_fin."','".$archivo."','".$contacto."','".$p_encuentro."','".$duracion."','".$_SESSION['user_id']."')";	
			}else{
				echo "<script>alert('El nombre de ruta ingresado ya existe')</script>";
			}
		
			$resultado = mysqli_query($conexion,$consulta);

			if($resultado){
				echo "<script>alert('La Ruta fue creada Exitosamente')</script>";
			}else{
				echo $resultado;
			}
		} else {
			echo "<script>alert('Ocurrió un error al mover el archivo')</script>";
		}
	} else {
		echo "<script>alert('No se recibió el archivo con la imagen de la Ruta')</script>";
	}

	@mysqli_close($conexion);
	echo '<script type= "text/javascript"> window.location = "../../rutas.php"; </script>';
?>
