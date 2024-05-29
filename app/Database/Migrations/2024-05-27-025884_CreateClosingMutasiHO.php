<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClosingMutasiHO extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_closing_mutasi_ho' => [
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
            'week_mutasi_ho' => [
                'type' => 'INT',
                'constraint' => 50,
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'type_mutasi' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true,
            ],
            'id_bank' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'bank_tujuan' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'saldo' => [
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

        $this->forge->addPrimaryKey('id_closing_mutasi_ho');
        $this->forge->createTable('closing_mutasi_ho');
    }

    public function down()
    {
        $this->forge->dropTable('closing_mutasi_ho');
    }
}
