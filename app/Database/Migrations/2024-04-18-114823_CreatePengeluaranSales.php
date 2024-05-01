<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengeluaranSales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengeluaran_sales' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_branch' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_sales' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_area' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'id_partner' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'minggu_pengeluaran_sales' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'keterangan_pengeluaran_sales' => [
                'type' => 'VARCHAR',
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

        $this->forge->addPrimaryKey('id_pengeluaran_sales');
        $this->forge->createTable('pengeluaran_sales');
    }

    public function down()
    {
        $this->forge->dropTable('pengeluaran_sales');
    }
}
