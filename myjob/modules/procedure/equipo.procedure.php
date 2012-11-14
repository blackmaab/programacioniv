<?php

include_once '../class/Equipo.class.php';
$newEquipo = new Equipo();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newEquipo->descripcion = strtoupper($_POST["txtEquipo"]);        
        $newEquipo->idTipoEquipo=$_POST["selEH"];
        $newEquipo->addEquipo();
    } else if ($_POST["txtType"] == "search") {
        $newEquipo->descripcion = strtoupper($_POST["txtEquipo"]) . "%";
        $newEquipo->searchEquipo();
    } else if ($_POST["txtType"] == "update") {
        $newEquipo->idEquipo = $_POST["txtIdEquipo"];
        $newEquipo->descripcion = strtoupper($_POST["txtEquipo"]);        
        $newEquipo->idTipoEquipo=$_POST["selEH"];
        $newEquipo->updateEquipo();
    } else if ($_POST["txtType"] == "delete") {
        $newEquipo->idEquipo = $_POST["txtIdEquipo"];
        $newEquipo->deleteEquipo();
    } else if ($_POST["txtType"] == "cargar") {
        //$newEquipo->idEquipo = $_POST["txtIdEquipo"];
        $newEquipo->cargarComboEquipo();
    }
}
?>
