<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClosingSalesBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_csb' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_branch' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_product' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_sales' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_nota' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'week' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'payment_method' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2', // Adjust precision and scale as needed
                'default' => '0.00',
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => '10', // Adjust precision and scale as needed
            ],
        ]);

        $this->forge->addPrimaryKey('id_csb');
        $this->forge->createTable('closing_sales_barang');
    }

    public function down()
    {
        $this->forge->dropTable('closing_sales_barang');
    }
}
