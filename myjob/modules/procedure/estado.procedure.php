<?php

include_once '../class/Estado.class.php';
$newEstado = new Estado();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newEstado->descripcion = strtoupper($_POST["txtEstado"]);
        $newEstado->idPais = $_POST["selPaisEstado"];
        $newEstado->addEstado();
    } else if ($_POST["txtType"] == "search") {
        $newEstado->descripcion = strtoupper($_POST["txtEstado"]) . "%";
        $newEstado->searchEstado();
    } else if ($_POST["txtType"] == "update") {
        $newEstado->idEstado = $_POST["txtIdEstado"];
        $newEstado->descripcion = strtoupper($_POST["txtEstado"]);
        $newEstado->idPais = $_POST["selPaisEstado"];
        $newEstado->updateEstado();
    } else if ($_POST["txtType"] == "delete") {
        $newEstado->idEstado = $_POST["txtIdEstado"];
        $newEstado->deleteEstado();
    }
}
?>