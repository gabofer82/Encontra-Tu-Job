<?php
include __DIR__ . '/../dominio/usuario.class.php';
include __DIR__ . '/../lang/es.php';
$GLOBALS['visit'] = $visit_bar;

if (!isset($_SESSION['user'])) {
session_start();
$_SESSION['user'] = new Usuario(0, $visit_bar, "", "", "");
//Usuario no se podia convertir a string por eso era imposible mostrarlo
//para eso agregue un nuevo indice al $_SESSION
$_SESSION['name_user'] = $_SESSION['user']->getNick();
}
//los echos estaban de la asignacion de los datos
echo "<script>alert('Bienvenido ,ldffsfala " . $GLOBALS['visit'] . "');</script>";
echo "<script>alert('Bienvenido ,lala " . $_SESSION['name_user'] . "');</script>";
?>
<div id="barra-usuario">
	<span><?php echo $saludo_bar
		?>
		<?php 	echo $_SESSION['user'] -> getNick();?></span>
	<?php
	if ($_SESSION['user'] -> getNick() == $GLOBALS['visit']) {
		echo '<form action="controladores/usuario_controller.php?action=login" method="post" id="login-usr">
<label>' . $usr_bar . '</label>
<input type="text" name="user-name"/>
<label>' . $pass_bar . '</label>
<input type="password" name="password" />
<input type="submit" value="' . $submit_bar . '"/>
<a href="./vistas/usuarios_alta.php" onclick="RegistroMostrar();">' . $reglink_bar . '</a>
</form>';
	} else {
		echo '<span id="logout-usr"><a href="#">' . $logout_bar . '</a></span>';
	}
	?>
</div>