<?php
	include_once __DIR__.'/../templates/header.php';
	include_once __DIR__.'/../templates/user-bar.php';
	include_once __DIR__.'/../templates/content.php';
 	include_once __DIR__.'/../modelos/candidato_admin.class.php';
	$objU = CandidatoAdmin::getInstance() ;
	$GLOBALS['adminCandidato'] = $objU;
	
	if (!$objU->tieneCurriculum()) {
		
		echo "Aun no has ingresado tu Curriculum al Sistema.";
		echo "Hazlo haciendo click"
?> <a href="alta-curriculum.php">aqui</a><?php
} else {
	
}
?>