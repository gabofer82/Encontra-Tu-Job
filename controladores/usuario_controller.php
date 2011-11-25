<?php

if (isset($_REQUEST['tarea'])) {
	
	$tarea = $_REQUEST['tarea'];
	
	if ($tarea == 'login' && login_usuario()) {
		
		$_SESSION['iniciada'] = true;
	
	} elseif ($tarea == 'logout') {
		
		session_destroy();
		session_start();
		get_sid();
		
	} else {
		echo "<script>alert('Usuario no existe o Contrase?a incorrecta.');</script>";
	}
}
$nombre_usuario = (isset($_SESSION['u_nombre'])) ? ($_SESSION['u_nombre']) : ("");

?>