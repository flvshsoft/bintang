<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClosingSales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cs' => [
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
            'id_nota' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'week' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'cash' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2', // Adjust precision and scale as needed
                'default' => '0.00',
            ],
            'kredit' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2', // Adjust precision and scale as needed
                'default' => '0.00',
            ],
        ]);

        $this->forge->addPrimaryKey('id_cs');
        $this->forge->createTable('closing_sales');
    }

    public function down()
    {
        $this->forge->dropTable('closing_sales');
    }
}
