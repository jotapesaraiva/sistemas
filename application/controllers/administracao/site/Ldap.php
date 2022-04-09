<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ldap extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        esta_logado();
        $this->load->config('auth_ad');
    }

    public function index() {
        $hosts          = $this->config->item('hosts');
        $common_hosts   = implode(', ', $hosts);
        $port           = $this->config->item('port');
        $tls            = $this->config->item('tls');
        $base_dn        = $this->config->item('base_dn');
        $ad_domain      = $this->config->item('ad_domain');
        $start_ou       = $this->config->item('start_ou');
        $new_usr_ou     = $this->config->item('new_user_ou');
        $shared_mbox_ou = $this->config->item('shared_mbox_ou');
        $proxy_user     = $this->config->item('proxy_user');
        $proxy_pass     = $this->config->item('proxy_pass');
        $admin_group    = $this->config->item('admin_group');

        $css['header_meio'] = '';
        $css['header_fim'] = load_css(array('layout/css/layout_topo'),'layouts');

        $js['footer_meio'] = '';
        $dados = array(
            'hosts'      => $common_hosts,
            'port'       => $port,
            'tls'        => $tls,
            'base_dn'    => $base_dn,
            'ad_domain'  => $ad_domain,
            'start_ou'   => $start_ou,
            'proxy_user' => $proxy_user,
            'proxy_pass' => $proxy_pass,
            'admin_group'=> $admin_group,
        );

        $this->breadcrumbs->unshift('<i class="icon-home"></i> Home', 'home');
        $this->breadcrumbs->push('<span>Administração</span>', '/administracao');
        $this->breadcrumbs->push('<span>Site</span>', '/administracao/site');
        $this->breadcrumbs->push('<span>LDAP</span>', '/administracao/site/ldap');

        $this->load->template('administracao/site/ldap',$dados,$css,$js);
    }

    public function salvar() {
        // echo "teste";
        $this->config->load('auth_ad', TRUE);
        $admin_group = $this->input->post('admin_group');
        $port        = $this->input->post('port');
        $base_dn     = $this->input->post('base_dn');
        $ad_domain   = $this->input->post('ad_domain');
        $start_ou    = $this->input->post('start_ou');
        // vd($this->input->post('admin_group'));
        $this->config->set_item('admin_group', $admin_group, 'auth_add');
        redirect('administracao/site/ldap');
    }
}

/* End of file Ldap.php */
/* Location: ./application/controllers/administracao/site/Ldap.php */