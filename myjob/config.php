<?php

define('MODULO_DEFECTO', 'home');
define('LAYOUT_DEFECTO', 'layout_default.php');
define('MODULO_PATH', realpath('modules'));
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

