<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_link extends CI_Migration {

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up() {
        $this->db->query("
         CREATE TABLE `tb_link` (
             `id_link` int(11) NOT NULL AUTO_INCREMENT,
             `url_link` varchar(255) NOT NULL,
             PRIMARY KEY (`id_link`)
         ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_link');
    }

}

/* End of file 025_Create_link.php */
/* Location: ./application/migrations/025_Create_link.php */