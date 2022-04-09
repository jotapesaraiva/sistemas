<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Method to load css files into your project.
 * @param array $css
 */
if ( ! function_exists('load_css'))
{
    function load_css($arquivo=NULL, $pasta='css', $media='all'){
        if ($arquivo !=NULL):
            $CI =& get_instance();
            $CI->load->helper('url');
            $retorno = '';
            if (is_array($arquivo)):
                foreach ($arquivo as $css) :
                    $retorno .= "\t".'<link rel="stylesheet" type="text/css" href=" '.base_url("assets/$pasta/$css.css").' " media=" '.$media.' "/>'. "\n";
                endforeach;
            else:
                     $retorno .= "\t".'<link rel="stylesheet" type="text/css" href=" '.base_url("assets/$pasta/$arquivo.css").'" media="'.$media.' "/>'. "\n";
            endif;
        endif;
        return $retorno;
    }
}
/*
 * Method to load javascript files into your project.
 * @param array $js
 */
if ( ! function_exists('load_js'))
{
    function load_js($arquivo=NULL, $pasta='js', $remoto=FALSE){
     if ($arquivo !=NULL):
            $CI =& get_instance();
            $CI->load->helper('url');
            $retorno = '';
            if (is_array($arquivo)):
                foreach ($arquivo as $js):
                    if ($remoto):
                        $retorno .= "\t".'<script type="text/javascript" src=" '.$js.' "></script>';
                    else:
                        $retorno .= "\t".'<script type="text/javascript" src=" '.base_url("assets/$pasta/$js.js").' "></script>'. "\n";
                    endif;
                endforeach;
            else:
                if ($remoto):
                        $retorno .= "\t".'<script type="text/javascript" src=" '.$arquivo.' "></script>';
                    else:
                        $retorno .= "\t".'<script type="text/javascript" src=" '.base_url("$assets/pasta/$arquivo.js").' "></script>'. "\n";
                    endif;
            endif;
        endif;
        return $retorno;
    }
}


/* End of file assets_helper.php */
/* Location: ./application/helpers/assets_helper.php */
