<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_audotoria extends CI_Migration {


    public function up() {
        $this->db->query ("
              CREATE TABLE `tb_auditoria` (
                `id_auditoria` int(11) NOT NULL AUTO_INCREMENT,
                `usuario_auditoria` varchar(45) NOT NULL,
                `data_hora_auditoria` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                `operacao_auditoria` varchar(45) NOT NULL,
                `query_auditoria` text NOT NULL,
                `observacao_auditoria` text NOT NULL,
                PRIMARY KEY (`id_auditoria`)
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        ");
    }

    public function down() {
        $this->dbforge->drop_table('tb_auditoria');
    }

}

/* End of file 003_Create_audotoria.php */
/* Location: ./application/migrations/003_Create_audotoria.php */