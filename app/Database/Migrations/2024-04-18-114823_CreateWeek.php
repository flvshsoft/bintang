<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWeek extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_week' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_week' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'bulan_week' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'tahun_week' => [
                'type' => 'INT',
                'constraint' => 11,
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

        $this->forge->addPrimaryKey('id_week');
        $this->forge->createTable('week');
    }

    public function down()
    {
        $this->forge->dropTable('week');
    }
}