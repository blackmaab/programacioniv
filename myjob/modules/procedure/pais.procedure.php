<?php

/**
 * Nombre de Archivo: pais.procedure.php
 * @author Mario Alvarado
 */
include_once '../class/Pais.class.php';
$newPais = new Pais();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newPais->descripcion = strtoupper($_POST["txtPais"]);
        $newPais->addPais();
    } else if ($_POST["txtType"] == "search") {
        $newPais->descripcion = strtoupper($_POST["txtPais"]) . "%";
        $newPais->searchPais();
    } else if ($_POST["txtType"] == "update") {
        $newPais->idPais = $_POST["txtIdPais"];
        $newPais->descripcion = strtoupper($_POST["txtPais"]);
        $newPais->updatePais();
    } else if ($_POST["txtType"] == "delete") {
        $newPais->idPais = $_POST["txtIdPais"];
        $newPais->deletePais();
    }
}
?>
