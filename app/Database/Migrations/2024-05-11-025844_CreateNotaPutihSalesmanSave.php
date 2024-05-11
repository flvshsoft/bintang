<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNotaPutihSalesmanSave extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_save_nota_putih_salesman' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_branch' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_partner' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
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

        $this->forge->addPrimaryKey('id_save_nota_putih_salesman');
        $this->forge->createTable('nota_putih_salesman_save');
    }

    public function down()
    {
        $this->forge->dropTable('nota_putih_salesman_save');
    }
}
