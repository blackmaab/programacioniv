<?php

include_once '../class/EmpresaCurriculum.class.php';
$newEmpresaCurriculum = new EmpresaCurriculum();
if (isset($_POST["txtType"])) {
    if ($_POST["txtType"] == "add") {
        $newEmpresaCurriculum->descripcion = strtoupper($_POST["txtDescripcionEmpresaCurriculum"]);
        $newEmpresaCurriculum->addEmpresaCurriculum();
    } else if ($_POST["txtType"] == "search") {
        $newEmpresaCurriculum->descripcion = strtoupper($_POST["txtDescripcionEmpresaCurriculum"]) . "%";
        $newEmpresaCurriculum->searchEmpresaCurriculum();
    } else if ($_POST["txtType"] == "update") {
        $newEmpresaCurriculum->idEmpresaCurriculum = $_POST["txtIdEmpresaCurriculum"];
        $newEmpresaCurriculum->descripcion = strtoupper($_POST["txtDescripcionEmpresaCurriculum"]);
        $newEmpresaCurriculum->updateEmpresaCurriculum();
    } else if ($_POST["txtType"] == "delete") {
        $newEmpresaCurriculum->idEmpresaCurriculum = $_POST["txtIdEmpresaCurriculum"];
        $newEmpresaCurriculum->deleteEmpresaCurriculum();
    }
}
?>