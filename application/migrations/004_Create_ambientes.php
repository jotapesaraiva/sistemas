<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_ambientes extends CI_Migration {

    // public function __construct()
    // {
    //     $this->load->dbforge();
    //     $this->load->database();
    // }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_ambiente` (
             `id_ambiente` int(11) NOT NULL AUTO_INCREMENT,
             `nome_ambiente` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_ambiente`)
         ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
        ");
        $data = array(
            array('id_ambiente' => '1', 'nome_ambiente' => 'Desenvolvimento'),
            array('id_ambiente' => '2', 'nome_ambiente' => 'Homologação'),
            array('id_ambiente' => '3', 'nome_ambiente' => 'Transição'),
            array('id_ambiente' => '4', 'nome_ambiente' => 'Produção')
        );

        $this->db->insert_batch('tb_ambiente', $data);
    }

    public function down() {
        $this->dbforge->drop_table('tb_ambiente');
    }

}

/* End of file 004_Create_ambiente.php */
/* Location: ./application/migrations/004_Create_ambiente.php */