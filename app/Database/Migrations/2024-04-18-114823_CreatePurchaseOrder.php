<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePurchaseOrder extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_purchase_order' => [
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
            'minggu_purchase_order' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'status_purchase_order' => [
                'type' => 'VARCHAR',
                'constraint' => 111,
                'null' => true,
            ],
            'keterangan_purchase_order' => [
                'type' => 'VARCHAR',
                'constraint' => 222,
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

        $this->forge->addPrimaryKey('id_purchase_order');
        $this->forge->createTable('purchase_order');
    }

    public function down()
    {
        $this->forge->dropTable('purchase_order');
    }
}