<?php

include_once '../class/TipoEquipoHerramienta.class.php';
$newTipoEquipoHerramienta = new TipoEquipoHerramienta();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newTipoEquipoHerramienta->descripcion = strtoupper($_POST["txtDescripcionTipoEquipoHerramienta"]);
        $newTipoEquipoHerramienta->addTipoEquipoHerramienta();
    } else if ($_POST["txtType"] == "search") {
        $newTipoEquipoHerramienta->descripcion = strtoupper($_POST["txtDescripcionTipoEquipoHerramienta"]) . "%";
        $newTipoEquipoHerramienta->searchTipoEquipoHerramienta();
    } else if ($_POST["txtType"] == "update") {
        $newTipoEquipoHerramienta->idTipoEquipoHerramienta = $_POST["txtIdTipoEquipoHerramienta"];
        $newTipoEquipoHerramienta->descripcion = strtoupper($_POST["txtDescripcionTipoEquipoHerramienta"]);
        $newTipoEquipoHerramienta->updateTipoEquipoHerramienta();
    } else if ($_POST["txtType"] == "delete") {
        $newTipoEquipoHerramienta->idTipoEquipoHerramienta = $_POST["txtIdTipoEquipoHerramienta"];
        $newTipoEquipoHerramienta->deleteTipoEquipoHerramienta();
    }
}
?>
