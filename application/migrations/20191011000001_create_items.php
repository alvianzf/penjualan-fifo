<?php defined('BASEPATH') OR exit('No!');

class Migration_create_items extends CI_Migration
{
    public function __construct(){
        parent::__construct();
    }

    public function up()
    {

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
                'nama_barang' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'qty' => [
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

    }

    public function down()
    {
        $this->dbforge->drop_table('production', true);
    }
}