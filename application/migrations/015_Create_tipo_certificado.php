<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_tipo_certificado extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_tipo_certificado` (
             `id_tipo_certificado` int(11) NOT NULL AUTO_INCREMENT,
             `nome_tipo_certificado` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_tipo_certificado`)
         ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
        ");
        $data = array(
            array('id_tipo_certificado' => '1', 'nome_tipo_certificado' => 'e-cnpj'),
            array('id_tipo_certificado' => '2', 'nome_tipo_certificado' => 'Web SSL'),
            array('id_tipo_certificado' => '3', 'nome_tipo_certificado' => 'A1-equipamento')
        );

        $this->db->insert_batch('tb_tipo_certificado', $data);
    }

    public function down() {
        $this->dbforge->drop_table('tb_tipo_certificado');
    }

}

/* End of file 015_Create_tipo_certificado.php */
/* Location: ./application/migrations/015_Create_tipo_certificado.php */