<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Migration_create_user extends CI_Migration
{
    public function up ()
    {
        if(!$this->db->table_exists('users')) {
            $this->dbforge->add_key('id', true);

            $this->dbforge->add_field(
                [
                    'id' => [
                        'type'      => 'MEDIUMINT',
                        'constraint'=> 8,
                        'unsigned'  => true,
                        'auto_increment'=> true
                    ],
                    'email' => [
                        'type'      => 'VARCHAR',
                        'constraint'=> 225,
                        'null'      => false
                    ],
                    'password' => [
                        'type'      => 'VARCHAR',
                        'constraint'=> 225,
                        'null'      => false
                    ],
                    'username' => [
                        'type'      => 'VARCHAR',
                        'constraint'=> 225,
                        'null'      => false
                    ]
                ]
            );

            $this->dbforge->create_table('users');
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}