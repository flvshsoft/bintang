<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePiutangUsaha extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_piutang_usaha' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_branch' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_supplier' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'minggu-ke' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'nama_penghutang' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true,
            ],
            'tgl_piutang' => [
                'type' => 'DATETIME',
            ],
            'type_piutang' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
            ],
            'jumlah_piutang' => [
                'type' => 'INT',
                'constraint' => '10', // Adjust precision and scale as needed
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

        $this->forge->addPrimaryKey('id_piutang_usaha');
        $this->forge->createTable('piutang_usaha');
    }

    public function down()
    {
        $this->forge->dropTable('piutang_usaha');
    }
}
