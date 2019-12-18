<?php defined ('BASEPATH') OR exit (' No direct script acess allowed!');

class Migration_create_reports extends CI_Migration
{
    public function __construct()
    {
        parent::__construct();
    }

    public function up()
    {

        if ($this->db->table_exists('catatan_pembayaran'))
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
                    'buyer_id' => [
                        'type'      => 'VARCHAR',
                        'constraint'=> 200,
                        'null'      => false
                    ],
                    'tanggal' => [
                        'type'      => 'INT',
                        'constraint'=> 12,
                        'unsigned'  => true,
                        'null'      => true
                    ],
                    'nominal' => [
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

            $this->dbforge->create_table('catatan_pembayaran', true);
        }

    }

    public function down()
    {
        $this->dbforge->drop_table('catatan_pembayaran', true);
    }
}