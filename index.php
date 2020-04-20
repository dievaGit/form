<?php
$errores = "";
$enviado = "";

if (isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];

	if (!empty($nombre)) {
		$nombre = trim($nombre);
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
	}else{
		$errores .= 'Por favor ingresa un nombre <br />';
	}


	if (!empty($correo)) {
		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

		if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
			$errores .= 'Por favor ingresa un correo valido <br />';
		}

	}else{
		$errores .= 'Por favor ingresa un correo <br />';
	}


	if (!empty($mensaje)) {
		$mensaje = htmlspecialchars($mensaje);
		$mensaje = trim($mensaje);
		$mensaje = stripcslashes($mensaje);

	}else{
		$errores .= 'Por favor ingresa un mensaje <br />';
	}

    
    //enviando la informacion hacia el hosting que tengas
    if (!$errores) {
    	$enviar_a = 'tunombre@tuempresa.com';
    	$asunto = 'correo enviado desde miPagina.com';
    	$mensaje_preparado = "De: $nombre \n";
    	$mensaje_preparado = "De: $nombre \n";
    	$mensaje_preparado = "De: $nombre \n";
        
        //esta linea es para enviar al hosting
    	//mail($enviar_a, $asunto, $mensaje_preparado);
    	$enviado = 'true';
    }

}
require 'index.view.php';
?>