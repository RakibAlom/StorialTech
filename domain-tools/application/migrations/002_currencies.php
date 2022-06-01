<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Currencies extends CI_Migration {
    public function create_tables() {
        $this->load->database();

        // Defaults
        $this->currencies();

        return true;
    }

    public function currencies() {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'enabled' => [
                'type' => 'BIT',
                'default' => TRUE
            ],
            'default' => [
                'type' => 'BIT',
                'default' => FALSE
            ]
        ));
        
        $this->dbforge->create_table('currencies', TRUE);
    }

    public function up() {
        $this->create_tables();
    }

    public function down() {
        $this->dbforge->drop_table('currencies');
    }
}