<?php

define('MODULO_DEFECTO', 'home');
define('LAYOUT_DEFECTO', 'plantilla_defecto.php');
define('MODULO_PATH', realpath('modulos'));
define('LAYOUT_PATH', realpath('layouts'));


$conf['home'] = array(
    'archivo' => 'pages/home.php',
    'layout' => LAYOUT_DEFECTO
);

/* ERROR AL NO ENCONTRAR LA PÁGINA */
$conf['404'] = array(
    'archivo' => 'pages/404.php',
    'layout' => LAYOUT_DEFECTO
);
?>

