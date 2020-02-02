<?php

function autoloadController($sinif_ismi){
    $sinif_adresi = CDIR.'/'.$sinif_ismi.'.php';
    if (is_readable($sinif_adresi)) {
        require $sinif_adresi;
    }
}
function autoloadModel($sinif_ismi){
    $sinif_adresi = MDIR.'/'.$sinif_ismi.'.php';
    if (is_readable($sinif_adresi)) {
        require $sinif_adresi;
    }
}
function autoloadView($sinif_ismi){
    $sinif_adresi = VDIR.'/'.$sinif_ismi.'.php';
    if (is_readable($sinif_adresi)) {
        require $sinif_adresi;
    }
}

spl_autoload_register("autoloadController");
spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadView");
?>