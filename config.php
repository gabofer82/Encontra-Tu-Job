<?php

define('RUTA_RAIZ', __DIR__);
define('SERVER_URL', $_SERVER['HTTP_HOST'] . '/Encontra-Tu-Job/templates');
define('TEMPLATES', RUTA_RAIZ . '/templates');
define('CSS', 'http://'.SERVER_URL . '/css');
define('JS', TEMPLATES . '/js');
define('IMAGENES', TEMPLATES . '/imagenes');
set_include_path(get_include_path() . PATH_SEPARATOR . RUTA_RAIZ);
?>