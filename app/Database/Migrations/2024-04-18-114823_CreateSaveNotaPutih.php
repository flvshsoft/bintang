<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSaveNotaPutih extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_save_nota_putih' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_branch' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_nota' => [
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
            'minggu_nota_putih' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'total_beli' => [
                'type' => 'INT',
                'constraint' => 255,
                'null' => true,
            ],
            'total_bayar' => [
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

        $this->forge->addPrimaryKey('id_save_nota_putih');
        $this->forge->createTable('nota_putih_save');
    }

    public function down()
    {
        $this->forge->dropTable('nota_putih_save');
    }
}
