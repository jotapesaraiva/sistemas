<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader{

    public function template($view, $dados=array(), $css=array(), $js=array())
    {
        $CI =& get_instance();
        if($css==array()){
            $css['header_meio'] = '';
            $css['header_fim'] = '';
        }
        if($js==array()){
            $js['footer_meio'] = '';
        }

        $CI->load->view('template/header',$css);
        $CI->load->view('template/navbar');
        if($view != 'home'){
            $CI->load->view('template/sidebar');
        }
        $CI->load->view('pages/'.$view, $dados);
        $CI->load->view('template/footer',$js);
    }


    public function template_login($view,$css,$js)
    {
        $CI =& get_instance();
        if($css==array()){
            $css['header_meio'] = '';
            $css['header_fim'] = '';
        }
        if($js==array()){
            $js['footer_meio'] = '';
        }
        $CI->load->view('template/header',$css);
        $CI->load->view('pages/'.$view);
        $CI->load->view('template/footer',$js);
    }

}
/* End of file MY_Loader.php */
/* Location: ./application/core/MY_Loader.php */