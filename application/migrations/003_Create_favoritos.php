<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_favoritos extends CI_Migration {

    public function up() {
        $this->db->query ("
        CREATE TABLE `tb_favoritos` (
            `id_favoritos` int(11) NOT NULL AUTO_INCREMENT,
            `data_favoritos` datetime NOT NULL,
            `usuario_favoritos` varchar(255) DEFAULT NULL,
            `celula_favoritos` varchar(255) DEFAULT NULL,
            `equipe_favoritos` varchar(255) DEFAULT NULL,
            `projetos_favoritos` varchar(255) DEFAULT NULL,
            `projeto_nome_favoritos` varchar(255) DEFAULT NULL,
            `status_aberto_favoritos` varchar(255) DEFAULT NULL,
            `periodo_inicial_favoritos` varchar(255) DEFAULT NULL,
            `periodo_final_favoritos` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id_favoritos`)
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_favoritos');
    }

}

/* End of file 003_Create_favoritos.php */
/* Location: ./application/migrations/003_Create_favoritos.php */