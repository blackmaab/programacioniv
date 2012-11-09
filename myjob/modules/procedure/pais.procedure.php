<?php

/**
 * Nombre de Archivo: pais.procedure.php
 * Fecha Creación: 11-08-2012 
 * Hora: 09:05:22 PM
 * @author Mario Alvarado
 */
if (isset($_POST["txtPais"])) {
    echo $_POST["txtPais"];
} else {
    echo "hola";
}

/* if (isset($_POST["txtPais"])) {
  include_once '../class/Pais.class.php';
  $newPais = new Pais();
  $newPais->descripcion = CASE_UPPER($_POST["txtPais"]);
  $newPais->addPais();
  } */

//include_once('../class/Galeria.class.php');
//include_once('../class/ConfigSeguridad.class.php');
//
////verifiacion de la session
//$sesion = new ConfigSeguridad();
//$respuesta = $sesion->validarSesion();
//
//if ($respuesta == true) {
//    //verificacion de que los datos sean enviados
//    if (isset($_POST["txtTitulo"]) && isset($_POST["selCategoria"])) {
//        //creacion de nuevo album
//        $album = new Galeria();
//        $album->setId(null);
//        $album->setTitulo($_POST["txtTitulo"]);
//        $album->setCategoria($_POST["selCategoria"]);
//        $album->setEstado(1); //activo                       
//        $album->setFecha_Creacion(date("Y-m-d H:i:s"));
//        $album->setUsuario($sesion->getId());
//
//        /* Registrando variables de session para el nuevo album */
//        $sesion->setIdAlbum($album->getId());
//        $sesion->setTituloAlbum($album->getTitulo());
//        $sesion->registrarVarAlbum();
//
//        $album->addGaleria(); //agregando galeria
//        //echo $_SESSION["id"];
//        //echo $album->getId();
//    }
//} else {
//    echo "expire-Su Sesion ha Expirado";
//}
?>
