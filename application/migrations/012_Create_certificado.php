<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_certificado extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_certificado` (
             `id_certificado` int(11) NOT NULL AUTO_INCREMENT,
             `id_tipo_certificado` int(11) DEFAULT NULL,
             `documentacao_certificado` int(11) DEFAULT NULL,
             `nome_certificado` varchar(255) DEFAULT NULL,
             `url_certificado` varchar(255) DEFAULT NULL,
             `validade_certificado` varchar(255) DEFAULT NULL,
             `diretorio_certificado` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_certificado`)
         ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
        ");
        // $data = array(
        //     array('id_certificado' => '1', 'nome_certificado' => 'GitLab', 'id_tipo_certificado' => '1', 'id_documentacao' => '2', 'url_certificado' => '', 'validade_certificado'),
        //     array('id_certificado' => '2', 'nome_certificado' => 'GED'),
        //     array('id_certificado' => '3', 'nome_certificado' => 'Wki'),
        //     array('id_certificado' => '4', 'nome_certificado' => 'Redmine')
        // );

        // $this->db->insert_batch('tb_certificado', $data);
    }

    public function down() {
        $this->dbforge->drop_table('tb_certificado');
    }

}

/* End of file 012_Create_certificado.php */
/* Location: ./application/migrations/012_Create_certificado.php */