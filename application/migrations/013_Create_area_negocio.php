<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_area_negocio extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_area_negocio` (
             `id_area_negocio` int(11) NOT NULL AUTO_INCREMENT,
             `id_sistema` int(11) NOT NULL,
             `id_negocio` int(11) NOT NULL,
             PRIMARY KEY (`id_area_negocio`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
        $data = array(
            array('id_area_negocio' => '1', 'nome_area_negocio' => 'Arrecadação'),
            array('id_area_negocio' => '2', 'nome_area_negocio' => 'Fiscalização'),
            array('id_area_negocio' => '3', 'nome_area_negocio' => 'Estratégica')
        );

        $this->db->insert_batch('tb_area_negocio', $data);
    }

    public function down() {
        $this->dbforge->drop_table('tb_area_negocio');
    }

}

/* End of file 013_Create_area_negocio.php */
/* Location: ./application/migrations/013_Create_area_negocio.php */