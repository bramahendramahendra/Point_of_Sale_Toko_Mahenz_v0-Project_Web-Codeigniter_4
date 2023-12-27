<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Wholesale extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'total' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'price' => [
                'type'       => 'INT',
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('wholesale');
    }

    public function down()
    {
        $this->forge->dropTable('wholesale');
    }
}
