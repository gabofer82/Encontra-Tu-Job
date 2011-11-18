<?php

	include __DIR__.'/../modelos/DataBase.class.php';

	$db = DataBase::getInstance();
	$GLOBALS['conexion'] = $db;

?>