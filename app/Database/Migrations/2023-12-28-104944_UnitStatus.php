<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UnitStatus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'active' => [
                'type'      => 'BOOLEAN',
                'default'   => false,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('unitstatuses');
    }

    public function down()
    {
        $this->forge->dropTable('unitstatuses');
    }
}
