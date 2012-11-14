<?php

include_once '../class/TipoEmpleo.class.php';
$newTipoEmpleo = new TipoEmpleo();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newTipoEmpleo->descripcion = strtoupper($_POST["txtTipoEmpleo"]);
        $newTipoEmpleo->idAreaEmpleo=$_POST["selArea"];
        $newTipoEmpleo->addTipoEmpleo();
    } else if ($_POST["txtType"] == "search") {
        $newTipoEmpleo->descripcion = strtoupper($_POST["txtTipoEmpleo"]) . "%";
        $newTipoEmpleo->searchTipoEmpleo();
    } else if ($_POST["txtType"] == "update") {
        $newTipoEmpleo->idTipoEmpleo = $_POST["txtIdTipoEmpleo"];
        $newTipoEmpleo->descripcion = strtoupper($_POST["txtTipoEmpleo"]);
        $newTipoEmpleo->idAreaEmpleo=$_POST["selArea"];
        $newTipoEmpleo->updateTipoEmpleo();
    } else if ($_POST["txtType"] == "delete") {
        $newTipoEmpleo->idTipoEmpleo = $_POST["txtIdTipoEmpleo"];
        $newTipoEmpleo->deleteTipoEmpleo();
    } else if ($_POST["txtType"] == "cargar") { 
        $newTipoEmpleo->idAreaEmpleo=$_POST["selAreaEmpleo"];
        $newTipoEmpleo->fijar=$_POST["txtFijar"];
        $newTipoEmpleo->cargarComboTipoEmpleo();
    }
}
?>
