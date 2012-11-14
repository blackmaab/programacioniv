<?php

/**
 * Nombre de Archivo: estadoCarrera.procedure.php
 * @author Mario Alvarado
 */
include_once '../class/EstadoCarrera.class.php';
$newEstadoCarrera = new EstadoCarrera();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newEstadoCarrera->descripcion = strtoupper($_POST["txtDescripcionEstadoCarrera"]);
        $newEstadoCarrera->addEstadoCarrera();
    } else if ($_POST["txtType"] == "search") {
        $newEstadoCarrera->descripcion = strtoupper($_POST["txtDescripcionEstadoCarrera"]) . "%";
        $newEstadoCarrera->searchEstadoCarrera();
    } else if ($_POST["txtType"] == "update") {
        $newEstadoCarrera->idEstadoCarrera = $_POST["txtIdEstadoCarrera"];
        $newEstadoCarrera->descripcion = strtoupper($_POST["txtDescripcionEstadoCarrera"]);
        $newEstadoCarrera->updateEstadoCarrera();
    } else if ($_POST["txtType"] == "delete") {
        $newEstadoCarrera->idEstadoCarrera = $_POST["txtIdEstadoCarrera"];
        $newEstadoCarrera->deleteEstadoCarrera();
    }
}
?>
