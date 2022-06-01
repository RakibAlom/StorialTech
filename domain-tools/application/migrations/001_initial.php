<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Initial extends CI_Migration {
    public function create_tables() {
        $this->load->database();

        // Defaults
        $this->admin_users();
        $this->options();
        $this->pages();

        $this->tlds();

        $this->add_data();

        return true;
    }

    public function admin_users() {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '512',
                'null' => TRUE
            ],
            'super' => [
                'type' => 'BIT',
                'constraint' => '1',
                'null' => TRUE,
                'default' => 0
            ],
            'forget_token' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ],
            'remember_token' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ]
        ));
        
        $this->dbforge->create_table('admin_users', TRUE);
    }

    public function options() {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'key' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'value' => [
                'type' => 'LONGTEXT',
                'null' => TRUE
            ],
            'autoload' => [
                'type' => 'BIT',
                'constraint' => '1',
                'null' => TRUE,
                'default' => 1
            ]
        ));

        $this->dbforge->create_table('options', TRUE);
    }

    public function pages() {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'title' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'permalink' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'placement' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ],
            'status' => [
                'type' => 'BIT',
                'constraint' => '1',
                'null' => TRUE
            ],
            'order' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE
            ],
            'body' => [
                'type' => 'LONGTEXT',
                'null' => TRUE
            ]
        ));

        $this->dbforge->create_table('pages', TRUE);
    }

    public function tlds() {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'tld' => [
                'type' => 'VARCHAR',
                'constraint' => '63',
                'null' => TRUE,
            ],
            'whois_server' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ],
            'pattern' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ],
            'is_main' => [
                'type' => 'BIT',
                'constraint' => 1,
                'null' => TRUE,
                'default' => 0
            ],
            'is_suggested' => [
                'type' => 'BIT',
                'constraint' => 1,
                'null' => TRUE,
                'default' => 0
            ],
            'price' => [
                'type' => 'TINYTEXT'
            ],
            'sale_price' => [
                'type' => 'TINYTEXT'
            ],
            'affiliate_link' => [
                'type' => 'TEXT'
            ],
            'status' => [
                'type' => 'BIT',
                'constraint' => 1,
                'null' => TRUE,
                'default' => 1
            ],
            'tld_order' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ]
        ));

        $this->dbforge->create_table('tlds', TRUE);
    }

    public function add_data() {
        $this->tlds_data();
    }

    public function tlds_data() {
        $data = [
            [
              'tld' => '.com',
              'whois_server' => 'whois.crsnic.net',
              'pattern' => 'no match for',
              'is_main' => 1,
              'is_suggested' => 1,
              'price' => '13.99',
              'sale_price' => '11.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 1,
            ],
            [
              'tld' => '.org',
              'whois_server' => 'whois.pir.org',
              'pattern' => 'not found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '9.99',
              'sale_price' => '9.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 2,
            ],
            [
              'tld' => '.net',
              'whois_server' => 'whois.crsnic.net',
              'pattern' => 'no match for',
              'is_main' => 0,
              'is_suggested' => 1,
              'price' => '15.99',
              'sale_price' => '14.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 3,
            ],
            [
              'tld' => '.info',
              'whois_server' => 'whois.afilias.info',
              'pattern' => 'not found',
              'is_main' => 0,
              'is_suggested' => 1,
              'price' => '2.99',
              'sale_price' => '2.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 4,
            ],
            [
              'tld' => '.app',
              'whois_server' => 'whois.nic.google',
              'pattern' => 'domain not found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '16.99',
              'sale_price' => '16.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 5,
            ],
            [
              'tld' => '.uk',
              'whois_server' => 'whois.nic.uk',
              'pattern' => 'no match for',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '1.00',
              'sale_price' => '0.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 6,
            ],
            [
              'tld' => '.us',
              'whois_server' => 'whois.nic.us',
              'pattern' => 'no data found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '1.00',
              'sale_price' => '1.00',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 7,
            ],
            [
              'tld' => '.mobi',
              'whois_server' => 'whois.afilias.net',
              'pattern' => 'not found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '169.99',
              'sale_price' => '169.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 8,
            ],
            [
              'tld' => '.cc',
              'whois_server' => 'whois.nic.cc',
              'pattern' => 'no match for',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '5.99',
              'sale_price' => '5.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 9,
            ],
            [
              'tld' => '.io',
              'whois_server' => 'whois.nic.io',
              'pattern' => 'not found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '53.99',
              'sale_price' => '53.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 10,
            ],
            [
              'tld' => '.co',
              'whois_server' => 'whois.nic.co',
              'pattern' => 'no data found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '11.99',
              'sale_price' => '11.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 11,
            ],
            [
              'tld' => '.xyz',
              'whois_server' => 'whois.nic.xyz',
              'pattern' => 'domain not found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '0.99',
              'sale_price' => '0.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 12,
            ],
            [
              'tld' => '.biz',
              'whois_server' => 'whois.nic.biz',
              'pattern' => 'no data found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '7.99',
              'sale_price' => '7.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 13,
            ],
            [
              'tld' => '.ly',
              'whois_server' => 'whois.nic.ly',
              'pattern' => 'not found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '14.99',
              'sale_price' => '14.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 14,
            ],
            [
              'tld' => '.in',
              'whois_server' => 'whois.registry.in',
              'pattern' => 'no data found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '6.99',
              'sale_price' => '6.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 1,
              'tld_order' => 15,
            ],
        ];

        if(!count($this->db->get('tlds')->result_array())) {
            $this->db->insert_batch('tlds', $data);
        }
    }

    public function up() {
        $this->create_tables();
    }

    public function down() {
        $this->dbforge->drop_table('admin_users');
        $this->dbforge->drop_table('pages');
        $this->dbforge->drop_table('tlds');
        $this->dbforge->drop_table('options');
    }
}