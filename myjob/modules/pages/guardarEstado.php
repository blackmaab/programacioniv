<?php
extract($_POST);
if(isset($btnEstado)){
    $campos=[];
    $campos[0]=$selPaisEstado;
    $campos[1]=$txtEstado;
    if($obj->guardar_dep_estado($campos)){
        echo "Estado guardado con exito";        
    }
}
?>
