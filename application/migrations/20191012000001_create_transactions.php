<?php defined('BASEPATH') OR exit('No!');

class Migration_create_transactions extends CI_Migration
{
    public function __construct(){
        parent::__construct();
    }

    public function up()
    {

        if (! $this->db->table_exists(('buyer')))
        {
            $this->dbforge->add_key('id', true);
            $this->dbforge->add_field([
                'id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true
                ],
                'nama' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'perusahaan' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'nomor_kontak' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 21,
                    'null'          => false
                ],
                'created_at' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ]
            ]);

            $this->dbforge->create_table('buyer', true);
        }

        if (! $this->db->table_exists(('transactions')))
        {
            $this->dbforge->add_key('id', true);
            $this->dbforge->add_field([
                'id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true
                ],
                'buyer_id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                ],
                'tanggal' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ],
                'qty' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ],
                'nominal' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ],
                'keterangan' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'created_at' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ]
            ]);

            $this->dbforge->create_table('transactions', true);
        }

    }

    public function down()
    {
        $this->dbforge->drop_table('buyer', true);
    }
}