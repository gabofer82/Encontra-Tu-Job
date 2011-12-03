<?php
include 'templates/header.php';
include 'templates/user-bar.php';
include 'templates/content.php';
include 'modelos/empresa_admin.class.php';
	$objU = EmpresaAdmin::getInstance() ;
	$GLOBALS['adminEmpresa'] = &$objU;

$gestora = EmpresaAdmin::getInstance();
?>
<div id="cont-variable">
	<p>Alta exitosa</p>
	<p>Aqui debe ir el perfil de la empresa</p>
</div>
</div> <?php
include 'templates/footer.php';
?>
