<?php

/**
 * Nombre de Archivo: tipoDocumento.procedure.php
 * @author Mario Alvarado
 */

include_once '../class/TipoDocumento.class.php';
$newTipoDocumento = new TipoDocumento();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        if (isset($_POST["txtTipoDocumento"])) {
            $newTipoDocumento->descripcion = strtoupper($_POST["txtTipoDocumento"]);
            $newTipoDocumento->addTipoDocumento();
        }
    } else if ($_POST["txtType"] == "search") {
        $newTipoDocumento->descripcion = strtoupper($_POST["txtTipoDocumento"]) . "%";
        $newTipoDocumento->searchTipoDocumento();
    } else if ($_POST["txtType"] == "update") {
        $newTipoDocumento->idTipoDocumento = $_POST["txtIdTipoDocumento"];
        $newTipoDocumento->descripcion = strtoupper($_POST["txtTipoDocumento"]);
        $newTipoDocumento->updateTipoDocumento();
    } else if ($_POST["txtType"] == "delete") {
        $newTipoDocumento->idTipoDocumento = $_POST["txtIdTipoDocumento"];
        $newTipoDocumento->deleteTipoDocumento();
    }
}
?>
