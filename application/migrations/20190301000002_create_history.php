<?php

class Migration_create_history extends CI_Migration
{
    public function up()
    {
        if (! $this->db->table_exists('history')) {
            $this->dbforge->add_key('id', true);

            $this->dbforge->add_field(
                [
                    'id' => [
                        'type'      => 'MEDIUMINT',
                        'constraint'=> 8,
                        'null'      => false,
                        'auto_increment'=> true
                    ],
                    'username' => [
                        'type'      => 'VARCHAR',
                        'constraint'=> 225,
                        'null'      => false
                    ],
                    'result' => [
                        'type'      => 'VARCHAR',
                        'constraint'=> 225,
                        'null'      => false
                    ],
                    'created_at' => [
                        'type'      => 'INT',
                        'constraint'=> 11,
                        'null'      => false
                    ]
                ]
            );

            $this->dbforge->create_table('history');
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('history');
    }
}