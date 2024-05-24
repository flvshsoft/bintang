<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClosingPengeluaranSales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_closing_pengeluaran_sales' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_branch' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'week_pengeluaran_sales' => [
                'type' => 'INT',
                'constraint' => 50,
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 250,
                'null' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'total_pengeluaran_sales' => [
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

        $this->forge->addPrimaryKey('id_closing_pengeluaran_sales');
        $this->forge->createTable('closing_pengeluaran_sales');
    }

    public function down()
    {
        $this->forge->dropTable('closing_pengeluaran_sales');
    }
}