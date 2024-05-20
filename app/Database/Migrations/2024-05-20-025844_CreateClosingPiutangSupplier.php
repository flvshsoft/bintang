<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClosingPiutangSupplier extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_closing_piutang_supplier' => [
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
            'week_piutang_supplier' => [
                'type' => 'INT',
                'constraint' => 50,
                'null' => true,
            ],
            'id_supplier' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'total_piutang_supplier' => [
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

        $this->forge->addPrimaryKey('id_closing_piutang_supplier');
        $this->forge->createTable('closing_piutang_supplier');
    }

    public function down()
    {
        $this->forge->dropTable('closing_piutang_supplier');
    }
}