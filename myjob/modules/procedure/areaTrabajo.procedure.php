<?php

include_once '../class/AreaTrabajo.class.php';
$newAreaTrabajo = new AreaTrabajo();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newAreaTrabajo->descripcion = strtoupper($_POST["txtDescripcionArea"]);
        $newAreaTrabajo->addAreaTrabajo();
    } else if ($_POST["txtType"] == "search") {
        $newAreaTrabajo->descripcion = strtoupper($_POST["txtDescripcionArea"]) . "%";
        $newAreaTrabajo->searchAreaTrabajo();
    } else if ($_POST["txtType"] == "update") {
        $newAreaTrabajo->idAreaTrabajo = $_POST["txtIdAreaTrabajo"];
        $newAreaTrabajo->descripcion = strtoupper($_POST["txtDescripcionArea"]);
        $newAreaTrabajo->updateAreaTrabajo();
    } else if ($_POST["txtType"] == "delete") {
        $newAreaTrabajo->idAreaTrabajo = $_POST["txtIdAreaTrabajo"];
        $newAreaTrabajo->deleteAreaTrabajo();
    }
}
?>
