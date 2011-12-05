<?php

include 'lang/es.php';

$GLOBALS['visit'] = $visit_bar;
session_start();
if (!isset($_SESSION['user'])) {
$usrAnon = new Usuario(0, $visit_bar, "", "", "");	
$_SESSION['user'] = $usrAnon;
//Usuario no se podia convertir a string por eso era imposible mostrarlo
//para eso agregue un nuevo indice al $_SESSION
$_SESSION['name_user'] = $_SESSION['user']->getNick();
}
?>
<div id="barra-usuario">
<span>
<?php
echo $saludo_bar." ";
echo $_SESSION['user'] -> getNick();
?>
</span>
<?php
if ($_SESSION['user'] -> getNick() == $GLOBALS['visit']) {
echo '<form action="http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/Encontra-Tu-Job/index.php?controlador=Usuarios&accion=login_usr" method="post" id="login-usr">
<label>' . $usr_bar . '</label>
<input type="text" name="user-name"/>
<label>' . $pass_bar . '</label>
<input type="password" name="password" />
<input type="submit" value="' . $submit_bar . '"/>
<a href="http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/Encontra-Tu-Job/index.php?controlador=Registro&accion=seleccionar">' . $reglink_bar . '</a>
</form>';
} else {
echo '<span id="logout-usr"><a href="http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/Encontra-Tu-Job/index.php?controlador=Usuarios&accion=logout_usr">' . $logout_bar . '</a></span>';
}
?>
</div>