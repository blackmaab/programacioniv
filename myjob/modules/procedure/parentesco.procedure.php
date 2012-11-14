<?php

/**
 * Nombre de Archivo: parentesco.procedure.php
 * @author Mario Alvarado
 */
include_once '../class/Parentesco.class.php';
$newParentesco = new Parentesco();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        if (isset($_POST["txtParentesco"])) {
            $newParentesco->descripcion = strtoupper($_POST["txtParentesco"]);
            $newParentesco->addParentesco();
        }
    } else if ($_POST["txtType"] == "search") {
        $newParentesco->descripcion = strtoupper($_POST["txtParentesco"]) . "%";
        $newParentesco->searchParentesco();
    } else if ($_POST["txtType"] == "update") {
        $newParentesco->idParentesco = $_POST["txtIdParentesco"];
        $newParentesco->descripcion = strtoupper($_POST["txtParentesco"]);
        $newParentesco->updateParentesco();
    } else if ($_POST["txtType"] == "delete") {
        $newParentesco->idParentesco = $_POST["txtIdParentesco"];
        $newParentesco->deleteParentesco();
    }
}
?>
