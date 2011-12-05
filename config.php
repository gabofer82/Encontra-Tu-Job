<?php
$config = Config::singleton();

$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');
$config->set('librerias','libs/');

$config->set('dbhost', 'localhost');
$config->set('dbname', 'etj_db');
$config->set('dbuser', 'root');
$config->set('dbpass', '');
?>