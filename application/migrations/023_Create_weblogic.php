<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Class_name extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_weblogic` (
             `id_weblogic` int(11) NOT NULL AUTO_INCREMENT,
             `nome_weblogic` varchar(255) NOT NULL,
             `id_servidor` int(11) NOT NULL,
             `id_ambiente` int(11) NOT NULL,
             `id_contexto` int(11) NOT NULL,
             `id_tecnologia` int(11) NOT NULL,
             PRIMARY KEY (`id_weblogic)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_weblogic');
    }

}

/* End of file class_name.php */
/* Location: ./application/migrations/class_name.php */