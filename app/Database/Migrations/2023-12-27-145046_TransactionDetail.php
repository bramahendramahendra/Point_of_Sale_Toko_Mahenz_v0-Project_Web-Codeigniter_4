<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'transaction_id' => [
                'type'           => 'INT',
            ],
            'product_id' => [
                'type'           => 'INT',
            ],
            'quantity' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'price' => [
                'type'       => 'INT',
            ],
            'discount_percent' => [
                'type'       => 'INT',
                'null' => true,
            ],
            'discount_nominal' => [
                'type'       => 'INT',
                'null' => true,
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transactiondetails');
    }

    public function down()
    {
        $this->forge->dropTable('transactiondetails');
    }
}
