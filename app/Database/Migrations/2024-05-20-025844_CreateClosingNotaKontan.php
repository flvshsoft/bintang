<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClosingNotaKontan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_closing_nota_kontan' => [
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
            'week_kontan' => [
                'type' => 'INT',
                'constraint' => 50,
                'null' => true,
            ],
            'id_partner' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'total_tertagih' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'total_kontan' => [
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

        $this->forge->addPrimaryKey('id_closing_nota_kontan');
        $this->forge->createTable('closing_nota_kontan');
    }

    public function down()
    {
        $this->forge->dropTable('closing_nota_kontan');
    }
}