<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClosingSumaryDeviasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_closing_summary_deviasi' => [
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
            'week_summary_deviasi' => [
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
            'before_deviasi_modal' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'before_deviasi_jual' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'after_deviasi_modal' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'after_deviasi_jual' => [
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

        $this->forge->addPrimaryKey('id_closing_summary_deviasi');
        $this->forge->createTable('closing_summary_deviasi');
    }

    public function down()
    {
        $this->forge->dropTable('closing_summary_deviasi');
    }
}