<?php

define('MODULO_DEFECTO', 'home');
define('LAYOUT_DEFECTO', 'layout_default.php');
define('LAYOUT_ADMINISTRATOR', 'layout_administrator.php');
define('LAYOUT_COMPANY', 'layout_company.php');
define('LAYOUT_USER', 'layout_user.php');
define('MODULO_PATH', realpath('modules'));
define('LAYOUT_PATH', realpath('layouts'));


/* MODULO POR DEFECTO */
$conf['home'] = array(
    'archivo' => 'pages/home.php',
    'layout' => LAYOUT_DEFECTO
);


$conf['myAccount'] = array(
    'archivo' => 'pages/frmUsuario.php',
    'layout' => LAYOUT_DEFECTO
);

$conf['viewCompanies'] = array(
    'archivo' => 'pages/viewCompanies.php',
    'layout' => LAYOUT_DEFECTO
);

/* MODULO DE ADMINISTRADOR */
$conf['homeAdministrator'] = array(
    'archivo' => 'pages/home_admin.php',
    'layout' => LAYOUT_ADMINISTRATOR
);
$conf['catalogAdmin'] = array(
    'archivo' => 'pages/catalogos_admin.php',
    'layout' => LAYOUT_ADMINISTRATOR
);
$conf['viewAccountAdmin'] = array(
    'archivo' => 'pages/updateAccount.php',
    'layout' => LAYOUT_ADMINISTRATOR
);


/* MODULO DE COMPAÑIA | EMPRESA */
$conf['homeCompany'] = array(
    'archivo' => 'pages/home_Company.php',
    'layout' => LAYOUT_COMPANY
);

$conf['job'] = array(
    'archivo' => 'pages/job_company.php',
    'layout' => LAYOUT_COMPANY
);

$conf['viewAccountCompany'] = array(
    'archivo' => 'pages/updateAccount_company.php',
    'layout' => LAYOUT_COMPANY
);

/* MODULO DE USUARIO | PERSONA */
$conf['homeUser'] = array(
    'archivo' => 'pages/home_User.php',
    'layout' => LAYOUT_USER
);

$conf['newCurriculum'] = array(
    'archivo' => 'pages/frmCurriculum_user.php',
    'layout' => LAYOUT_USER
);

$conf['viewAccountUser'] = array(
    'archivo' => 'pages/updateAccount.php',
    'layout' => LAYOUT_USER
);

/* ERROR AL NO ENCONTRAR LA PÁGINA */
$conf['404'] = array(
    'archivo' => 'pages/404.php',
    'layout' => LAYOUT_DEFECTO
);
?>

