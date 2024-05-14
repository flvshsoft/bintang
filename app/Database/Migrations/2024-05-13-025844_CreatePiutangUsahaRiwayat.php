<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePiutangUsahaRiwayat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_piutang_usaha_riwayat' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_piutang_usaha' => [
                'type' => 'INT',
                'constraint' => 50,
                'null' => true,
            ],
            'id_bank' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_branch' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'ket_riwayat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'total' => [
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

        $this->forge->addPrimaryKey('id_piutang_usaha_riwayat');
        $this->forge->createTable('piutang_usaha_riwayat');
    }

    public function down()
    {
        $this->forge->dropTable('piutang_usaha_riwayat');
    }
}
