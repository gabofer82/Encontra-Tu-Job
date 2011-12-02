<?php
include_once './../../templates/header.php';
include_once  './../../templates/user-bar.php';
include_once './../../templates/content.php';
include_once './../../modelos/empresa_admin.class.php';
	$objU = EmpresaAdmin::getInstance() ;
	$GLOBALS['adminEmpresa'] = &$objU;

$gestora = EmpresaAdmin::getInstance();
?>
<div id="cont-variable">
	<p>Alta exitosa</p>
	<p>Aqui debe ir el perfil de la empresa</p>
</div>
</div> <?php
include_once '../../templates/footer.php';
?>
