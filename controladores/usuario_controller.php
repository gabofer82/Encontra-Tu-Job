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
	} elseif ($orden == 'logout') {
		session_start();
		session_destroy();
		} else {
		echo "<script>	alert('Usuario no existe o Contrase�a incorrecta.');</script>";
	}
	header("location:../index.php");
}

?>
