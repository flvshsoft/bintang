<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClosingSalesmanProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_closing_salesman_product' => [
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
            'week_salesman_product' => [
                'type' => 'INT',
                'constraint' => 50,
                'null' => true,
            ],
            'id_product' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'satuan_product' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true,
            ],
            'jumlah_kredit' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'total_kredit' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'jumlah_cash' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'total_cash' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'total_cash_kredit' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
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

        $this->forge->addPrimaryKey('id_closing_salesman_product');
        $this->forge->createTable('closing_salesman_product');
    }

    public function down()
    {
        $this->forge->dropTable('closing_salesman_product');
    }
}
