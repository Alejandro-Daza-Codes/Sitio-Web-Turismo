<?php
	//Llamadas de Conexion
	@include ("../../config/conexion.php");
	
	//Variables que recibe
	$id_ruta = strtoupper(trim($_POST['id']));
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
	
	if(isset($_FILES['img_mapa'])) {
		$fileName = $_FILES['img_mapa']['name'];
		$fileType = $_FILES['img_mapa']['type'];
		$fileSize = $_FILES['img_mapa']['size'];
		if(!empty($fileName)){
			$destino = "../../images/mapas/" . $fileName;
			$archivo = "images/mapas/" . $fileName;
			move_uploaded_file( $_FILES['img_mapa']['tmp_name'], $destino);	
		}
	} 

	$query = "SELECT img_mapa FROM rutas WHERE id_ruta ='".$id_ruta."'";
	$contenido = mysqli_query($conexion,$query);
	$data = @mysqli_fetch_assoc($contenido);

	if(empty($archivo)) $archivo = $data['img_mapa'];
	$consulta = "UPDATE rutas SET nombre_ruta = '".$nombre."', descripcion = '".$descripcion."', precio = ".$precio.",fecha_ini = '".$fecha_ini."',fecha_fin='".$fecha_fin."',img_mapa='".$archivo."',contacto='".$contacto."',p_encuentro='".$p_encuentro."', duracion = '".$duracion."'	WHERE id_ruta = '".$id_ruta."'";
	$resultado = mysqli_query($conexion,$consulta);

	if($resultado){
		echo "<script>alert('La Ruta fue modificada Exitosamente')</script>";
	}else{
		echo $resultado;
	}

	@mysqli_close($conexion);
	echo '<script type= "text/javascript"> window.location = "../../rutas.php"; </script>';
?>
