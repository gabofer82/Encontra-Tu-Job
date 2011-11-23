<?php
include __DIR__ . '/../dominio/usuario.class.php';
include __DIR__ . '/../lang/es.php';
$GLOBALS['visit'] = $visit_bar;


session_start();

if (!isset($_SESSION['user'])) {
	$_SESSION['user'] = new Usuario(0,$visit_bar, "", "","");
}

?>
<div id="barra-usuario">
	<span><?php echo $saludo_bar
		?>
		<?php 	echo $_SESSION['user'] -> getNick();
		?></span>
	<?php
	
	if ($_SESSION['user'] -> getNick() == $GLOBALS['visit']) {
		echo '<form action="#" method="post" id="login-usr">
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