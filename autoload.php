<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

<script src="Lib/Js/jquery.js"></script>
<script src="Lib/Js/process.js"></script>
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