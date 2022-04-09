<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_contexto extends CI_Migration {

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_contexto` (
             `id_contexto` int(11) NOT NULL AUTO_INCREMENT,
             `nome_contexto` varchar(255) DEFAULT NULL,
             PRIMARY KEY (`id_contexto`)
         ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
        ");
        $data = array(
            array('id_contexto' => '1', 'nome_contexto' => 'Externo'),
            array('id_contexto' => '2', 'nome_contexto' => 'Interno'),
            array('id_contexto' => '3', 'nome_contexto' => 'Processamento'),
            array('id_contexto' => '4', 'nome_contexto' => 'API-Interno'),
            array('id_contexto' => '5', 'nome_contexto' => 'API-Externo'),
            array('id_contexto' => '6', 'nome_contexto' => 'NFC'),
            array('id_contexto' => '7', 'nome_contexto' => 'SEFANET')
        );

        $this->db->insert_batch('tb_contexto', $data);
    }

    public function down() {
        $this->dbforge->drop_table('tb_contexto');
    }

}

/* End of file 005_Create_contexto.php */
/* Location: ./application/migrations/005_Create_contexto.php */