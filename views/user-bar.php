<?php

include 'lang/es.php';
$_SESSION['user']->setNick($visit_bar);
$_SESSION['name_user'] = $_SESSION['user']->getNick();
?>
<div id="barra-usuario">
	<span>
		<?php 
			echo $saludo_bar." ";
			echo $_SESSION['user'] -> getNick();
		?>
	</span>
<?php
	if ($visita) {
		echo '<form action="controladores/usuario_controller.php?action=login" method="post" id="login-usr">
<label>' . $usr_bar . '</label>
<input type="text" name="user-name"/>
<label>' . $pass_bar . '</label>
<input type="password" name="password" />
<input type="submit" value="' . $submit_bar . '"/>
<a href="./vistas/usuarios_alta.php" onclick="RegistroMostrar();">' . $reglink_bar . '</a>
</form>';
	} else {
		echo '<span id="logout-usr"><a href="controladores/usuario_controller.php?action=logout">' . $logout_bar . '</a></span>';
	}
?>
</div>