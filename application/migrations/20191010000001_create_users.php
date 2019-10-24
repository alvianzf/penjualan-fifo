<?php defined('BASEPATH') OR exit('NO!');

class Migration_Create_Users extends CI_Migration
{
    public function up()
    {
        if (! $this->db->table_exists(('users')))
        {
            $this->dbforge->add_key('id', true);
            $this->dbforge->add_field([
                'id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true
                ],
                'username' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'password' => [
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
            if ($this->dbforge->create_table('users', true)) {
                $this->db->insert_batch(
                    'users',
                    [
                        [
                            'id'        => 1,
                            'username'  => 'admin',
                            'password'  => hash('sha1', 'admin'),
                            'created_at'      => time()
                        ],
                        [
                            'id'        => 2,
                            'username'  => 'user',
                            'password'  => hash('sha1', 'user'),
                            'created_at'=> time()
                        ]
                    ]
                );
            }
        }

        if (! $this->db->table_exists(('user_details')))
        {
            $this->dbforge->add_key('id', true);
            $this->dbforge->add_field([
                'id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                    'auto_increment'=> true
                ],
                'user_id' => [
                    'type'          => 'MEDIUMINT',
                    'constraint'    => 11,
                    'unsigned'      => true,
                ],
                'name' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'position' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 200,
                    'null'          => false
                ],
                'contact_number' => [
                    'type'          => 'VARCHAR',
                    'constraint'    => 30,
                    'null'          => false
                ],
                'created_at' => [
                    'type'          => 'INT',
                    'constraint'    => 11,
                    'null'          => false
                ]
            ]);
            if ($this->dbforge->create_table('user_details', true)) {
                $this->db->insert_batch(
                    'user_details',
                    [
                        [
                            'id'        => 1,
                            'user_id'   => 1,
                            'name'      => 'John Travolta',
                            'position'  => 'Owner',
                            'contact_number'  => '081378202071',
                            'created_at'=> time()
                        ],
                        [
                            'id'        => 2,
                            'user_id'   => 2,
                            'name'      => 'John Appleseed',
                            'position'  => 'Admin',
                            'contact_number'  => '0878782881021',
                            'created_at'=> time()
                        ]
                    ]
                );
            }
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
        $this->dbforge->drop_table('user_details');
    }
}