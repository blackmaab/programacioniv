<?php

define('MODULO_DEFECTO', 'home');
define('LAYOUT_DEFECTO', 'layout_default.php');
define('LAYOUT_ADMINISTRATOR', 'layout_administrator.php');
define('MODULO_PATH', realpath('modules'));
define('LAYOUT_PATH', realpath('layouts'));


$conf['home'] = array(
    'archivo' => 'pages/home.php',
    'layout' => LAYOUT_DEFECTO
);


$conf['myAccount'] = array(
    'archivo' => 'pages/frmUsuario.php',
    'layout' => LAYOUT_DEFECTO
);

/* MODULO DE ADMINISTRADOR */
$conf['homeAdministrator'] = array(
    'archivo' => 'pages/home_admin.php',
    'layout' => LAYOUT_ADMINISTRATOR
);
$conf['catalog'] = array(
    'archivo' => 'pages/catalogos_admin.php',
    'layout' => LAYOUT_ADMINISTRATOR
);
$conf['viewAccountAdmin'] = array(
    'archivo' => 'pages/updateAccount.php',
    'layout' => LAYOUT_ADMINISTRATOR
);

/* ERROR AL NO ENCONTRAR LA PÁGINA */
$conf['404'] = array(
    'archivo' => 'pages/404.php',
    'layout' => LAYOUT_DEFECTO
);
?>

