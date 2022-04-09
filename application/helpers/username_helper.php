<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('username')){

    function username()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        $username = $CI->session->userdata('username');
        return $username;
    }

}
/* End of file username_helper.php */
/* Location: ./application/helpers/username_helper.php */