<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_usuario extends CI_Migration {

  public function up() {
        $this->db->query ( "
          CREATE TABLE `tb_usuario` (
            `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
            `nome_usuario` varchar(100) NOT NULL,
            `email_usuario` varchar(100) NOT NULL,
            `login_usuario` varchar(45) NOT NULL,
            `senha_usuario` varchar(32) NOT NULL,
            `ativo_usuario` tinyint(1) NOT NULL DEFAULT '1',
            `adm_usuario` tinyint(1) NOT NULL DEFAULT '0',
            PRIMARY KEY (`id_usuario`),
            UNIQUE KEY `email` (`email_usuario`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;" );

        $data = array('id_usuario' => '1',
                      'nome_usuario' => 'Administrador',
                      'email_usuario' => 'admin@sefa.pa.gov.br',
                      'login_usuario' => 'admin',
                      'senha_usuario' => 'f5547d99e2ca02b345d265b596bfad74',
                      'ativo_usuario' => '1',
                      'adm_usuario' => '1');

        $this->db->insert('tb_usuario', $data);

  }

  public function down() {

    $this->dbforge->drop_table('tb_usuario');

  }

}

/* End of file 001-create_full_tables.php */
/* Location: ./application/migrations/001-create_full_tables.php */
