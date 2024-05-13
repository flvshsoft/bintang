<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengeluaranSalesDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengeluaran_detail_sales' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pengeluaran_sales' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'id_branch' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'ket_pengeluaran' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'nominal' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('id_pengeluaran_detail_sales');
        $this->forge->createTable('pengeluaran_detail_sales');
    }

    public function down()
    {
        $this->forge->dropTable('pengeluaran_detail_sales');
    }
}