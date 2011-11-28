<?php
include_once __DIR__ . '/../modelos/usuario_admin.class.php';

function get_sid() {
	if (!isset($_SESSION['sID'])) {
		$sessionID = md5(uniqid(rand(), true));
		$_SESSION['sID'] = $sessionID;
	}
}

if (isset($_REQUEST['action'])) {
	$orden = $_REQUEST['action'];
	$usr = UsuarioAdmin::getInstance();
	$pass = md5($_POST['password']);
	if ($orden == 'login' && $usr -> login_usuario($_POST['user-name'], $pass)) {
		$_SESSION['iniciada'] = true;
		echo "<script>alert('Bienvenido ".$_POST['user-name']."');</script>";

		if (1==1) {
			
					header("location:../index.php");
		}
	} elseif ($tarea == 'logout') {
		session_destroy();
		session_start();
		get_sid();
	} else {
		echo "
			<script>
			alert('Usuario no existe o Contrase�a incorrecta.');
			</script>
			";
	}
}
$nombre_usuario = (isset($_SESSION['u_nombre'])) ? ($_SESSION['u_nombre']) : ("");
?>