<?php defined('BASEPATH') OR exit('No direct script access allowed');



// funcão que printa e finaliza a execução.
function pr($valor){
    echo "<pre>";
    print_r($valor);
    echo "</pre>";
    die();
}

function vd($valor){
    echo "<pre>";
    var_dump($valor);
    echo "</pre>";
    die();
}