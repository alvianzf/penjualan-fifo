<?php defined('BASEPATH') OR exit('No!');

class Migration_create_items extends CI_Migration
{
    public function __construct(){
        parent::__construct();
    }

    public function up()
    {

        if (! $this->db->table_exists('item_type')) {
            $this->dbforge->add_key('id', true);
            $this->dbforge->add_field([
                'id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true
                ],
                'tipe_barang' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'harga_barang' => [
                    'type'          => 'INT',
                    'constraint'    => 20,
                    'null'          => false
                ],
                'created_at' => [
                    'type'          => 'INT',
                    'constraint'    => 20,
                    'null'          => false
                ],

            ]);

            $this->dbforge->create_table('item_type', true);
        }

        if (! $this->db->table_exists(('production')))
        {
            $this->dbforge->add_key('id', true);
            $this->dbforge->add_field([
                'id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true
                ],
                'kode_produksi' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'tipe_barang' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 20,
                    'null'          => false
                ],
                'jumlah' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ],
                'satuan' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 20,
                    'null'          => false
                ],
                'harga' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ],
                'created_at' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ]
            ]);

            $this->dbforge->create_table('production', true);
        }

        if (! $this->db->table_exists(('purchasing')))
        {
            $this->dbforge->add_key('id', true);
            $this->dbforge->add_field([
                'id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true
                ],
                'kode_barang' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ],
                'nama_barang' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 20,
                    'null'          => false
                ],
                'tipe_barang' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 20,
                    'null'          => false
                ],
                'jumlah' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ],
                'satuan' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 20,
                    'null'          => false
                ],
                'harga' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ],
                'created_at' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ]
            ]);

            $this->dbforge->create_table('purchasing', true);
        }

    }

    public function down()
    {
        $this->dbforge->drop_table('production', true);
        $this->dbforge->drop_table('purchasing', true);
        $this->dbforge->drop_table('item_type', true);
    }
}