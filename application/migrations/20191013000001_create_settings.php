<?php defined ('BASEPATH') OR exit (' No direct script acess allowed!');

class Migration_create_settings extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
    }

    public function up()
    {

        if ($this->db->table_exists('tipe_bata'))
        {
            $this->dbforge->add_key('id', true);

            $this->dbforge->add_field(
                [
                    'id' => [
                        'type'      => 'MEDIUMINT',
                        'constraint'=> 8,
                        'unsigned'  => true,
                        'auto_increment'=> true
                    ],
                    'tipe' => [
                        'type'      => 'VARCHAR',
                        'constraint'=> 200,
                        'null'      => false
                    ],
                    'harga' => [
                        'type'      => 'INT',
                        'constraint'=> 12,
                        'unsigned'  => true,
                        'null'      => true
                    ],
                    'created_at' => [
                        'type'          => 'INT',
                        'constraint'    => 11,
                        'null'          => false
                    ]
                ]
            );

            $this->dbforge->create_table('tipe_bata', true);
        }

    }

    public function down()
    {
        $this->dbforge->drop_table('tipe_bata', true);
    }
}