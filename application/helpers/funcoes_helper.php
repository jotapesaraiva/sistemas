<?php defined('BASEPATH') OR exit('No direct script access allowed');

//Carrega um modulo do sistema devolvendo a tela solicitada
function load_modulo($modulo=NULL, $tela=NULL, $diretorio='conteudo'){
    $CI =& get_instance();
    if ($modulo !=NULL):
        return $CI->load->view("$diretorio/$modulo", array('tela'=>$tela), TRUE);
    else :
        return FALSE;
    endif;
}


function load_view($diretorio=NULL, $modulo=NULL, $data=NULL){
    $CI =& get_instance();
    if ($modulo !=NULL):
        if($data != NULL):
            return $CI->load->view("$diretorio/$modulo", $data, TRUE);
        else:
            return $CI->load->view("$diretorio/$modulo", NULL, TRUE);
        endif;
    else :
        return FALSE;
    endif;
}

    //seta valores ao array  $tema da class sistema
function set_tema($prop, $valor, $replace=TRUE){
    $CI =& get_instance();
    $CI->load->library('sistema');
    if ($replace){
        $CI->sistema->tema[$prop] = $valor;
    }
    else{
        if (!isset($CI->sistema->tema[$prop])) $CI->sistema->tema[$prop] = '';
        $CI->sistema->tema[$prop] .= $valor;
    }
}

//retorna os valores do array $tema da classe sistema
function get_tema(){
    $CI =& get_instance();
    $CI->load->library('sistema');
    return $CI->sistema->tema;
}

//inicializa o painel adm carregando os recursos necessarios
function init_painel(){
    $CI =& get_instance();
    //carregamento dos moduls
    $CI->load->helper('assets_helper');
    $CI->load->model('usuarios_model', 'usuarios');

    set_tema('template', 'dashboard');

    set_tema('header_inicio', load_css(array(
            'plugins/font-awesome/css/font-awesome.min',
            'plugins/simple-line-icons/simple-line-icons.min',
            'plugins/bootstrap/css/bootstrap',
            // 'plugins/uniform/css/uniform.default',
            'plugins/bootstrap-switch/css/bootstrap-switch.min'), 'global'), FALSE);
    //set_tema('header_meio', load_css('css/profile.min', 'pages'), FALSE); // usado  somente no login
    set_tema('header_fim', load_css(array(
            'css/components.min',
            'css/plugins.min'), 'global'), FALSE);
    set_tema('header_fim', load_css(array('layout/css/layout.min', 'layout/css/custom.min'), 'layouts'), FALSE);

    set_tema('footer_inicio', load_js(array(
            'plugins/jquery.min',
            'plugins/bootstrap/js/bootstrap.min',
            'plugins/js.cookie.min',
            'plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min',
            'plugins/jquery-slimscroll/jquery.slimscroll.min',
            'plugins/jquery.blockui.min',
            // 'plugins/uniform/jquery.uniform.min',
            'plugins/bootstrap-switch/js/bootstrap-switch.min'
        ), 'global'), FALSE);

    set_tema('footer_fim', load_js(array(
            'layout/scripts/layout.min',
            'layout/scripts/demo.min',
            'global/scripts/quick-sidebar.min'), 'layouts'), FAlSE);
}

//carrega um template passando o array $tema como paramentro
function load_template(){
    $CI =& get_instance();
    $CI->load->library('sistema');
    $CI->parser->parse($CI->sistema->tema['template'],  get_tema());
}


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

//mostra erros de validaçao em forms
function erros_validation(){
    if (validation_errors()) echo '<div class="alert-box alert">'.validation_errors('<p>', '</p>').'</div>';
}

/**
* Converts bytes into human readable file size.
*
//* @param string $bytes
//* @return string human readable file size (2,87 Мб)
//* @author Mogilev Arseny
//* @url http://php.net/manual/pt_BR/function.filesize.php
*/
function FileSizeConvert($bytes) {
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT"  => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT"  => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT"  => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT"  => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT"  => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem) {
        if($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
