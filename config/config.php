<?php

	include 'persistencia/DataBase.class.php';

	$db = DataBase::getInstance();
	$GLOBALS['conexion'] = $db;

?>