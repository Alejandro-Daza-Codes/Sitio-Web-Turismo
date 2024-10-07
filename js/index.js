	//Verfica si fecha es mayor a fecha2
	mayor = function (fecha, fecha2){
		var xMes=fecha.substring(3, 5);
		var xDia=fecha.substring(0, 2);
		var xAnio=fecha.substring(6,10);
		var yMes=fecha2.substring(3, 5);
		var yDia=fecha2.substring(0, 2);
		var yAnio=fecha2.substring(6,10);
		if (xAnio > yAnio){
			return(true);
		}else{
			if (xAnio == yAnio){
				if (xMes > yMes){
					return(true);
				}
			if (xMes == yMes){
			   if (xDia > yDia){
					return(true);
			   }else{
					return(false);
			   }
			}else{
			   return(false);
		   }
		}else{
		   return(false);
		}
		}
	}

	function save_ruta(){
		let form = document.getElementById('newRuta');
		var name_ruta = $('#name_ruta').val();
		var precio = $('#precio').val();
		var punto_e = $('#p_encuentro').val();
		var contact = $('#contact').val();
		var f_ini = $('#fecha_ini').val();
		var f_fin = $('#fecha_fin').val();
		var time = $('#duracion').val();
		var desc = $('#descripcion').val();
		var fileInput = document.getElementById('img_mapa');
    	var filePath = fileInput.value;
    	var allowedExtensions = /(.jpg|.jpeg|.png)$/i;

		if(!name_ruta  || !precio || !punto_e || !contact || !f_ini || !f_fin || !fileInput || !time || !desc)
			{ alert('Faltan Datos! Todos los campos son obligatorios'); }
		else{
			if(mayor(f_ini,f_fin)){
				alert('La fecha de inicio de la ruta no puede ser mayor a la fecha final'); 
				return false;
			}else{
				if(!allowedExtensions.exec(filePath)){
					alert('Por favor cargue un archivo de Mapa que tenga extensiones .jpeg/ .jpg/ .png');
					fileInput.value = '';
					return false;
				}else{
					form.submit();
				}	
			}
		}
	} 

	function edit_ruta(){
		let form = document.getElementById('frm_ruta');
		var name_ruta = $('#name_ruta').val();
		var precio = $('#precio').val();
		var punto_e = $('#p_encuentro').val();
		var contact = $('#contact').val();
		var f_ini = $('#fecha_ini').val();
		var f_fin = $('#fecha_fin').val();
		var time = $('#duracion').val();
		var desc = $('#descripcion').val();
		var fileInput = document.getElementById('img_mapa');
    	var filePath = fileInput.value;
    	var allowedExtensions = /(.jpg|.jpeg|.png)$/i;

		if(!name_ruta  || !precio || !punto_e || !contact || !f_ini || !f_fin || !time || !desc)
			{ alert('Faltan Datos! Todos los campos son obligatorios'); }
		else{
			if(mayor(f_ini,f_fin)){
				alert('La fecha de inicio de la ruta no puede ser mayor a la fecha final'); 
				return false;
			}else{
				if(filePath && !allowedExtensions.exec(filePath)){
					alert('Por favor cargue un archivo de Mapa que tenga extensiones .jpeg/ .jpg/ .png');
					fileInput.value = '';
					return false;
				}else{
					form.submit();
				}	
			}
		}
	} 

	function delete_ruta(id){
		var opcion = confirm("¿Seguro que desea eliminar la Ruta?");
		if (opcion == true) {
			alert(id);
		} 
	}

